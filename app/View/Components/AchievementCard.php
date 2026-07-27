<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AchievementCard extends Component
{
    public function __construct(
        public array $achievement
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.achievement-card');
    }
}