<?php

namespace App\Http\Controllers;

use App\Models\FocusSession;
use Carbon\Carbon;
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

        $streak = 0;

        $currentDate = Carbon::today();

        while (true) {

            $hasSession = FocusSession::where('user_id', $user->id)
                ->whereDate('completed_at', $currentDate)
                ->exists();

            if (! $hasSession) {
                break;
            }

            $streak++;

            $currentDate->subDay();
        }

        $dailyGoal = 120;

        $todayMinutes = FocusSession::where('user_id', $user->id)
            ->whereDate('completed_at', Carbon::today())
            ->sum('duration');

        $goalPercentage = $dailyGoal > 0
            ? min(round(($todayMinutes / $dailyGoal) * 100), 100)
            : 0;

        $remainingMinutes = max($dailyGoal - $todayMinutes, 0);

        $weekData = collect(range(6, 0))
            ->map(function ($daysAgo) use ($user) {

                $date = Carbon::today()->subDays($daysAgo);

                return [
                    'day' => $date->format('D'),

                    'minutes' => FocusSession::where('user_id', $user->id)
                        ->whereDate('completed_at', $date)
                        ->sum('duration'),
                ];
            });

        $recentSessions = FocusSession::with('task')
            ->where('user_id', $user->id)
            ->latest('completed_at')
            ->take(5)
            ->get();

        $topTasks = FocusSession::selectRaw('task_id, SUM(duration) as total_minutes')
            ->where('user_id', $user->id)
            ->whereNotNull('task_id')
            ->with('task')
            ->groupBy('task_id')
            ->orderByDesc('total_minutes')
            ->take(5)
            ->get();

        return view('progress.index', compact(
            'totalTasks',
            'completedTasks',
            'totalSessions',
            'totalMinutes',
            'productivityRate',
            'streak',
            'dailyGoal',
            'todayMinutes',
            'goalPercentage',
            'remainingMinutes',
            'weekData',
            'recentSessions',
            'topTasks'
        ));
    }
}