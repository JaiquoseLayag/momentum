<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\FocusSession;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalTasks = $user->tasks()->count();

        $completedTasks = $user->tasks()
            ->where('status', 'completed')
            ->count();

        $totalSessions = FocusSession::where('user_id', $user->id)
            ->count();

        $totalMinutes = FocusSession::where('user_id', $user->id)
            ->sum('duration');

        $productivityRate = $totalTasks > 0
            ? round(($completedTasks / $totalTasks) * 100)
            : 0;

        return view('progress.index', compact(
            'totalTasks',
            'completedTasks',
            'totalSessions',
            'totalMinutes',
            'productivityRate'
        ));
    }
}