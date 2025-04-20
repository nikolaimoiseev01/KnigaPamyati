<?php

namespace App\Livewire\Components;

use App\Models\FederalDistrict;
use App\Models\Product;
use Livewire\Component;

class RightCardDistrict extends Component
{
    public $district;
    protected $listeners = ['updateRightCardDistrict'];


    public function render()
    {
        return view('livewire.components.right-card-district');
    }



    public function updateRightCardDistrict($slug) {
        $this->district = FederalDistrict::where('slug', $slug)->with('company')->first();
    }
}
