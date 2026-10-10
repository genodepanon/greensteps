<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AutoAssignRule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoAssignRuleController extends Controller
{
    public function index()
    {
        if (Auth::user()?->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.'], 403);
        }

        return response()->json([
            'success' => true,
            'rules' => AutoAssignRule::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::user()?->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.'], 403);
        }

        $data = $request->validate([
            'category_pattern' => 'required|string|max:200',
            'team_name' => 'required|string|max:150',
            'is_active' => 'required|boolean',
        ]);

        if (!$this->teamExists($data['team_name'])) {
            return response()->json(['success' => false, 'message' => 'Choose an existing maintenance team.'], 422);
        }

        $rule = AutoAssignRule::create([
            'category_pattern' => trim($data['category_pattern']),
            'team_name' => $data['team_name'],
            'is_active' => $data['is_active'],
            'sort_order' => ((int) AutoAssignRule::max('sort_order')) + 1,
        ]);

        return response()->json(['success' => true, 'rule' => $rule]);
    }

    public function update(Request $request, int $id)
    {
        if (Auth::user()?->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.'], 403);
        }

        $rule = AutoAssignRule::find($id);
        if (!$rule) {
            return response()->json(['success' => false, 'message' => 'Rule not found.'], 404);
        }

        $data = $request->validate([
            'category_pattern' => 'required|string|max:200',
            'team_name' => 'required|string|max:150',
            'is_active' => 'required|boolean',
        ]);

        if (!$this->teamExists($data['team_name'])) {
            return response()->json(['success' => false, 'message' => 'Choose an existing maintenance team.'], 422);
        }

        $rule->update([
            'category_pattern' => trim($data['category_pattern']),
            'team_name' => $data['team_name'],
            'is_active' => $data['is_active'],
        ]);

        return response()->json(['success' => true, 'rule' => $rule->fresh()]);
    }

    public function destroy(int $id)
    {
        if (Auth::user()?->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.'], 403);
        }

        $rule = AutoAssignRule::find($id);
        if (!$rule) {
            return response()->json(['success' => false, 'message' => 'Rule not found.'], 404);
        }

        $rule->delete();

        return response()->json(['success' => true]);
    }

    private function teamExists(string $teamName): bool
    {
        return User::where('role', 'maintenance')->where('team_name', $teamName)->exists();
    }
}