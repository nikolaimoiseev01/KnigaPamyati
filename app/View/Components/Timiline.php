<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Timiline extends Component
{
    public $time_line;
    /**
     * Create a new component instance.
     */
    public function __construct($timeLine)
    {
        $this->time_line = $timeLine;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.timiline');
    }
}
