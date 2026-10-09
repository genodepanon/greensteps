<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Not authenticated']);
        }

        $teams = User::where('role', 'maintenance')
            ->whereNotNull('team_name')
            ->where('team_name', '!=', '')
            ->selectRaw('team_name, COUNT(*) as members')
            ->groupBy('team_name')
            ->orderBy('team_name')
            ->get();

        return response()->json(['success' => true, 'teams' => $teams]);
    }

    public function locations()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Not authenticated']);
        }

        $locations = TeamLocation::join('tasks', 'team_locations.task_id', '=', 'tasks.id')
            ->join('reports', 'tasks.report_id', '=', 'reports.id')
            ->whereIn('tasks.status', ['Assigned', 'In Progress'])
            ->select('team_locations.*', 'reports.category', 'reports.location', 'reports.id as report_id')
            ->orderByDesc('team_locations.recorded_at')
            ->get();

        return response()->json(['success' => true, 'locations' => $locations]);
    }
}