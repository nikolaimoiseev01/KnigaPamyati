<?php

namespace App\View\Components;

use App\Models\Veteran;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderVeteransMainPage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $veterans = Veteran::take(5)->get();
        return view('components.slider-veterans-main-page', compact('veterans'));
    }
}
