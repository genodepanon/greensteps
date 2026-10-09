<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\User;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $users = User::orderBy('role')->orderBy('full_name')
            ->get(['id', 'full_name', 'email', 'role', 'team_name', 'points', 'is_approved', 'is_rejected']);
        return response()->json(['success' => true, 'users' => $users]);
    }

    public function createMaintenance(Request $request)
    {
        $admin = Auth::user();
        if ($admin->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $data = $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'team_name' => 'required|string|max:150',
        ]);

        $user = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'maintenance',
            'team_name' => $data['team_name'],
            'points' => 0,
        ]);

        ActivityLogger::log('CREATE_MAINTENANCE_USER', $user->email . ' (' . $user->team_name . ')');

        return response()->json(['success' => true, 'message' => 'Maintenance account created.']);
    }

    public function givePoints(Request $request)
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'points'  => 'required|integer|min:1',
        ]);
        $target = User::find($data['user_id']);
        $target->increment('points', $data['points']);
        PointsLog::create([
            'user_id'    => $target->id,
            'points'     => $data['points'],
            'reason'     => 'Admin award',
            'awarded_by' => $u->id,
        ]);
        return response()->json(['success' => true, 'message' => 'Points awarded!']);
    }

    public function approve(Request $request, $id)
    {
        $admin = Auth::user();
        if ($admin->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $user = User::find($id);
        if (!$user || $user->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'User not found or not a maintenance account.']);
        }

        $user->is_approved = true;
        $user->is_rejected = false;
        $user->save();

        ActivityLogger::log('APPROVE_MAINTENANCE', $user->full_name . ' (' . $user->email . ') approved by ' . $admin->email);

        return response()->json(['success' => true, 'message' => 'Maintenance account approved.']);
    }

    public function reject(Request $request, $id)
    {
        $admin = Auth::user();
        if ($admin->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $user = User::find($id);
        if (!$user || $user->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'User not found or not a maintenance account.']);
        }

        $user->is_approved = false;
        $user->is_rejected = true;
        $user->save();

        ActivityLogger::log('REJECT_MAINTENANCE', $user->full_name . ' (' . $user->email . ') rejected by ' . $admin->email);

        return response()->json(['success' => true, 'message' => 'Maintenance account rejected.']);
    }
}