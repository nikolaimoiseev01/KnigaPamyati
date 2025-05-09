<?php

namespace App\View\Components;

use App\Models\FederalDistrict;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Map extends Component
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
        $districts = FederalDistrict::all();
        return view('components.map', compact('districts'));
    }
}
