<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class TopTasksCard extends Component
{
    public function __construct(
        public Collection $topTasks
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.top-tasks-card');
    }
}