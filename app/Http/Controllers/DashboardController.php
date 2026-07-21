<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        $totalTasks = $tasks->count();

        $completedTasks = $tasks
            ->where('status', 'completed')
            ->count();

        $pendingTasks = $tasks
            ->where('status', 'pending')
            ->count();

        $highPriorityTasks = $tasks
            ->where('priority', 'high')
            ->count();


        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'highPriorityTasks'
        ));
    }
}