<?php

namespace App\Http\Controllers;

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


        $recentTasks = auth()->user()
            ->tasks()
            ->latest()
            ->take(5)
            ->get();


        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'highPriorityTasks',
            'recentTasks'
        ));
    }
}