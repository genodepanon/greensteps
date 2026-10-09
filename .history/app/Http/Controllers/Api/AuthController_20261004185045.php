<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid credentials.']);
        }

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
            ],
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:150',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'role'      => 'nullable|in:citizen,maintenance,admin',
            'team_name' => 'nullable|string|max:150',
            'phone'     => 'nullable|string|max:50',
        ]);

        $role = $data['role'] ?? 'citizen';
        $teamName = $role === 'maintenance' ? ($data['team_name'] ?? null) : null;

        if ($role === 'maintenance' && !$teamName) {
            return response()->json(['success' => false, 'message' => 'Please select a team.']);
        }

        $user = User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => $role,
            'team_name' => $teamName,
            'phone'     => $data['phone'] ?? null,
        ]);

        ActivityLogger::log('REGISTER', $user->full_name . ' as ' . $user->role . ' (' . $user->email . ')');

        return response()->json([
            'success' => true,
            'message' => 'Account created! You can now login.',
            'user_id' => $user->id,
        ]);
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
                'id'        => $u->id,
                'full_name' => $u->full_name,
                'email'     => $u->email,
                'role'      => $u->role,
                'team_name' => $u->team_name,
                'points'    => $u->points,
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

    public function updateProfile(Request $request)
    {
        $u = Auth::user();
        $data = $request->validate([
            'full_name'        => 'required|string|max:150',
            'email'            => 'required|email|unique:users,email,' . $u->id,
            'current_password' => 'required',
            'new_password'     => 'nullable|string|min:6',
        ]);

        if (!Hash::check($data['current_password'], $u->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.']);
        }

        $u->full_name = $data['full_name'];
        $u->email = $data['email'];
        if (!empty($data['new_password'])) {
            $u->password = Hash::make($data['new_password']);
        }
        $u->save();

        ActivityLogger::log('UPDATE_PROFILE', 'Updated to ' . $u->email);

        return response()->json(['success' => true, 'message' => 'Profile updated!']);
    }
}