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
        $veterans = $veterans->map(function ($veteran) {
            if ($veteran->death_dt) {
                $veteran->dates_str = $veteran->birth_dt . ' - ' . $veteran->death_dt;
            } elseif ($veteran->birth_dt) {
                $veteran->dates_str = 'р. ' . $veteran->birth_dt;
            } else {
                $veteran->dates_str = '';
            }

            return $veteran;
        });
        return view('components.slider-veterans-main-page', compact('veterans'));
    }
}
