<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public string $padding = 'p-6'
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}