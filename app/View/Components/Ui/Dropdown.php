<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public $opts;
    public $placeholder;
    /**
     * Create a new component instance.
     */
    public function __construct($opts, $placeholder = null)
    {
        $this->opts = $opts;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.dropdown');
    }
}
