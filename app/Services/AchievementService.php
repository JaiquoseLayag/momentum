<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class AchievementService
{
    public function getAchievements(User $user): array
    {
        $completedTasks = $user->tasks()
            ->where('status', 'completed')
            ->count();

        $focusSessions = $user->focusSessions()->count();

        $focusMinutes = $user->focusSessions()->sum('duration');

        $totalTasks = $user->tasks()->count();

        $productivityRate = $totalTasks > 0
            ? round(($completedTasks / $totalTasks) * 100)
            : 0;

        $dailyGoal = 120;

        $todayMinutes = $user->focusSessions()
            ->whereDate('completed_at', Carbon::today())
            ->sum('duration');

        $dates = $user->focusSessions()
            ->whereNotNull('completed_at')
            ->orderByDesc('completed_at')
            ->get()
            ->pluck('completed_at')
            ->map(fn ($date) => Carbon::parse($date)->toDateString())
            ->unique()
            ->values();

        $streak = 0;

        $currentDate = Carbon::today();

        foreach ($dates as $date) {

            if ($date === $currentDate->toDateString()) {

                $streak++;

                $currentDate->subDay();

            } else {

                break;

            }

        }

        return [

            [
                'title' => 'First Focus',
                'description' => 'Complete your first focus session.',
                'category' => 'Focus',
                'icon' => 'bolt',
                'color' => 'blue',
                'current' => $focusSessions,
                'target' => 1,
                'unlocked' => $focusSessions >= 1,
            ],

            [
                'title' => 'Focus Master',
                'description' => 'Accumulate 500 focus minutes.',
                'category' => 'Focus',
                'icon' => 'fire',
                'color' => 'orange',
                'current' => $focusMinutes,
                'target' => 500,
                'unlocked' => $focusMinutes >= 500,
            ],

            [
                'title' => 'Marathon',
                'description' => 'Accumulate 1000 focus minutes.',
                'category' => 'Focus',
                'icon' => 'clock',
                'color' => 'indigo',
                'current' => $focusMinutes,
                'target' => 1000,
                'unlocked' => $focusMinutes >= 1000,
            ],

            [
                'title' => 'Getting Started',
                'description' => 'Complete 5 tasks.',
                'category' => 'Tasks',
                'icon' => 'check-circle',
                'color' => 'green',
                'current' => $completedTasks,
                'target' => 5,
                'unlocked' => $completedTasks >= 5,
            ],

            [
                'title' => 'Task Crusher',
                'description' => 'Complete 25 tasks.',
                'category' => 'Tasks',
                'icon' => 'clipboard-document-check',
                'color' => 'emerald',
                'current' => $completedTasks,
                'target' => 25,
                'unlocked' => $completedTasks >= 25,
            ],

            [
                'title' => 'Century Club',
                'description' => 'Complete 100 tasks.',
                'category' => 'Tasks',
                'icon' => 'trophy',
                'color' => 'yellow',
                'current' => $completedTasks,
                'target' => 100,
                'unlocked' => $completedTasks >= 100,
            ],

            [
                'title' => 'Building Momentum',
                'description' => 'Maintain a 3-day streak.',
                'category' => 'Consistency',
                'icon' => 'fire',
                'color' => 'red',
                'current' => $streak,
                'target' => 3,
                'unlocked' => $streak >= 3,
            ],

            [
                'title' => 'Weekly Warrior',
                'description' => 'Maintain a 7-day streak.',
                'category' => 'Consistency',
                'icon' => 'calendar',
                'color' => 'purple',
                'current' => $streak,
                'target' => 7,
                'unlocked' => $streak >= 7,
            ],

            [
                'title' => 'Consistency King',
                'description' => 'Maintain a 30-day streak.',
                'category' => 'Consistency',
                'icon' => 'trophy',
                'color' => 'yellow',
                'current' => $streak,
                'target' => 30,
                'unlocked' => $streak >= 30,
            ],

            [
                'title' => 'Productivity Pro',
                'description' => 'Reach 80% productivity.',
                'category' => 'Productivity',
                'icon' => 'chart-bar',
                'color' => 'purple',
                'current' => $productivityRate,
                'target' => 80,
                'unlocked' => $productivityRate >= 80,
            ],

            [
                'title' => 'Perfectionist',
                'description' => 'Reach 95% productivity.',
                'category' => 'Productivity',
                'icon' => 'sparkles',
                'color' => 'yellow',
                'current' => $productivityRate,
                'target' => 95,
                'unlocked' => $productivityRate >= 95,
            ],

            [
                'title' => 'Goal Getter',
                'description' => 'Reach your daily focus goal.',
                'category' => 'Goals',
                'icon' => 'flag',
                'color' => 'blue',
                'current' => $todayMinutes,
                'target' => $dailyGoal,
                'unlocked' => $todayMinutes >= $dailyGoal,
            ],

        ];
    }
}