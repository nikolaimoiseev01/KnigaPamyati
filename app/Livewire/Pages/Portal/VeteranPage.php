<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Veteran;
use Livewire\Component;

class VeteranPage extends Component
{
    public $veteran;

    public function render()
    {
        return view('livewire.pages.portal.veteran-page');
    }

    public function mount($id) {
        $this->veteran = Veteran::where('id', $id)->first();
    }
}
