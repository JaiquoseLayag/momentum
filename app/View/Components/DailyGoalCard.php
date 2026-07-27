<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DailyGoalCard extends Component
{
    public string $message;
    public string $color;

    public function __construct(
        public int $dailyGoal,
        public int $todayMinutes,
        public int $goalPercentage,
        public int $remainingMinutes
    ) {
        if ($goalPercentage >= 100) {

            $this->color = 'bg-green-500';
            $this->message = 'Goal achieved! Great work today!';

        } elseif ($goalPercentage >= 75) {

            $this->color = 'bg-blue-500';
            $this->message = 'Almost there! Keep going!';

        } elseif ($goalPercentage >= 50) {

            $this->color = 'bg-yellow-500';
            $this->message = 'Nice progress!';

        } else {

            $this->color = 'bg-red-500';
            $this->message = 'Let\'s build some momentum!';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.daily-goal-card');
    }
}