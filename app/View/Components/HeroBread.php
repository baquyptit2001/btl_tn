<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class HeroBread extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $name,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-bread');
    }
}
