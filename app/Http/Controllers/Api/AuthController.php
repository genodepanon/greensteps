<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityLogger;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $key = Str::lower($data['email']) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many login attempts. Please try again shortly.',
            ], 429)->header('Retry-After', RateLimiter::availableIn($key));
        }

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            RateLimiter::hit($key, 60);
            return response()->json(['success' => false, 'message' => 'Invalid credentials.']);
        }

        RateLimiter::clear($key);
        Auth::login($user);

        // Keep the active CSRF token stable while the user signs in so the SPA does not
        // immediately fail with a token mismatch after a successful login.
        ActivityLogger::log('LOGIN', $user->email . ' (' . $user->role . ')');

        return response()->json([
            'success' => true,
            'user' => [
                'id'        => $user->id,
                'full_name' => $user->full_name,
                'email'     => $user->email,
                'role'      => $user->role,
                'team_name' => $user->team_name,
                'points'    => $user->points,
                'photo_url' => $user->photo_url,
                'is_approved' => $user->is_approved,
            ],
        ]);
    }

    public function register(Request $request, ImageService $images)
    {
        $data = $request->validate([
            'full_name'  => 'required|string|max:150',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8',
            'phone'      => 'nullable|string|max:50',
            'role'       => 'nullable|in:citizen,maintenance,admin',
            'team_name'  => 'nullable|required_if:role,maintenance|string|max:150',
            'photo_data' => 'nullable|string|max:7000000',
        ]);
        $role = $data['role'] ?? 'citizen';

        $photoPath = !empty($data['photo_data']) ? $images->saveBase64($data['photo_data'], 'avatar') : null;

        $user = User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => $role,
            'team_name' => $role === 'maintenance' ? $data['team_name'] : null,
            'phone'     => $data['phone'] ?? null,
            'photo_url' => $photoPath,
        ]);

        ActivityLogger::log('REGISTER', $user->full_name . ' as ' . $user->role . ' (' . $user->email . ')');

        return response()->json([
            'success' => true,
            'message' => $role === 'maintenance'
                ? 'Maintenance application submitted. You can now login.'
                : ($role === 'admin'
                    ? 'Admin account created! You can now login.'
                    : 'Account created! You can now login.'),
            'user_id' => $user->id,
        ]);
    }

    public function adminRegister(Request $request, ImageService $images)
    {
        $data = $request->validate([
            'full_name'             => 'required|string|max:150',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
            'photo_data'            => 'nullable|string|max:7000000',
        ]);

        if ($data['password'] !== $data['password_confirmation']) {
            return response()->json([
                'success' => false,
                'message' => 'Passwords do not match.',
            ], 422);
        }

        $photoPath = !empty($data['photo_data']) ? $images->saveBase64($data['photo_data'], 'avatar') : null;

        $user = User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => 'admin',
            'team_name' => null,
            'phone'     => null,
            'photo_url' => $photoPath,
        ]);

        ActivityLogger::log('ADMIN_REGISTER', $user->full_name . ' as admin (' . $user->email . ')');

        return response()->json([
            'success' => true,
            'message' => 'Admin account created! You can now login.',
            'user_id' => $user->id,
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        Password::sendResetLink($request->only('email'));

        return response()->json([
            'success' => true,
            'message' => 'If that email is registered, a password reset link will be sent.',
        ]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset($data, function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        });

        if ($status !== Password::PASSWORD_RESET) {
            return response()->json([
                'success' => false,
                'message' => 'This reset link is invalid or expired. Request a new one.',
            ], 422);
        }

        return response()->json(['success' => true, 'message' => 'Password updated. You can now sign in.']);
    }

    public function session(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false]);
        }
        $u = Auth::user();
        return response()->json([
            'success' => true,
            'user' => [
                'id'          => $u->id,
                'full_name'   => $u->full_name,
                'email'       => $u->email,
                'role'        => $u->role,
                'team_name'   => $u->team_name,
                'points'      => $u->points,
                'photo_url'   => $u->photo_url,
                'is_approved' => $u->is_approved,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            ActivityLogger::log('LOGOUT', $user->email);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => true]);
    }

    public function updateProfile(Request $request, ImageService $images)
    {
        $u = Auth::user();
        $data = $request->validate([
            'full_name'        => 'required|string|max:150',
            'email'            => 'required|email|unique:users,email,' . $u->id,
            'current_password' => 'required',
            'new_password'     => 'nullable|string|min:8',
            'photo_data'       => 'nullable|string|max:7000000',
            'remove_photo'     => 'nullable|boolean',
        ]);

        if (!Hash::check($data['current_password'], $u->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.']);
        }

        $u->full_name = $data['full_name'];
        $u->email = $data['email'];
        if (!empty($data['new_password'])) {
            $u->password = Hash::make($data['new_password']);
        }

        if (!empty($data['remove_photo'])) {
            $u->photo_url = null;
        } elseif (!empty($data['photo_data'])) {
            $photoPath = $images->saveBase64($data['photo_data'], 'avatar');
            if ($photoPath) {
                $u->photo_url = $photoPath;
            }
        }

        $u->save();

        ActivityLogger::log('UPDATE_PROFILE', 'Updated to ' . $u->email);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated!',
            'user' => [
                'id'          => $u->id,
                'full_name'   => $u->full_name,
                'email'       => $u->email,
                'role'        => $u->role,
                'team_name'   => $u->team_name,
                'points'      => $u->points,
                'photo_url'   => $u->photo_url,
                'is_approved' => $u->is_approved,
            ],
        ]);
    }
}