<?php

namespace App\Http\Controllers;

use App\Services\AchievementService;

class AchievementController extends Controller
{
    public function __construct(
        protected AchievementService $achievementService
    ) {
    }

    public function index()
    {
        $achievements = $this->achievementService
            ->getAchievements(auth()->user());

        return view('achievements.index', compact(
            'achievements'
        ));
    }
}