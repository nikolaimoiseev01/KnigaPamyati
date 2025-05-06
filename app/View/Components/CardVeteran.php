<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardVeteran extends Component
{
    public $veteran;
    public $dates_str;
    /**
     * Create a new component instance.
     */
    public function __construct($veteran)
    {
        $this->veteran = $veteran;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->veteran['death_dt']) {
            $this->dates_str = $this->veteran['birth_dt'] . ' - ' . $this->veteran['death_dt'];
        } elseif ($this->veteran['birth_dt']) {
            $this->dates_str = 'р. ' . $this->veteran['birth_dt'];
        } else {
            $this->dates_str = '';
        }
        return view('components.card-veteran');
    }
}
