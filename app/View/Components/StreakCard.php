<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StreakCard extends Component
{
    public string $title;
    public string $message;
    public string $icon;
    public string $color;

    public function __construct(
        public int $streak
    ) {
        $this->title = $streak . ' ' . ($streak === 1 ? 'Day' : 'Days');

        if ($streak === 0) {

            $this->icon = 'sparkles';
            $this->color = 'text-gray-500';
            $this->message = 'Start your first focus session today!';

        } elseif ($streak <= 3) {

            $this->icon = 'fire';
            $this->color = 'text-orange-500';
            $this->message = 'Great start!';

        } elseif ($streak <= 7) {

            $this->icon = 'rocket-launch';
            $this->color = 'text-blue-600';
            $this->message = 'You\'re building momentum!';

        } elseif ($streak <= 30) {

            $this->icon = 'trophy';
            $this->color = 'text-yellow-500';
            $this->message = 'Amazing consistency!';

        } else {

            $this->icon = 'star';
            $this->color = 'text-purple-600';
            $this->message = 'Productivity Master!';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.streak-card');
    }
}