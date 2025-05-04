<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MedalsGallery extends Component
{
    public $medals;
    /**
     * Create a new component instance.
     */
    public function __construct($medalss)
    {
        $this->medals = $medalss;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.medals-gallery');
    }
}
