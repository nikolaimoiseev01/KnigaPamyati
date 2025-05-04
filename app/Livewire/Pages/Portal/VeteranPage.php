<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Veteran;
use Livewire\Component;

class VeteranPage extends Component
{
    public $veteran;
    public $dates_str;
    public function render()
    {
        return view('livewire.pages.portal.veteran-page');
    }

    public function mount($id) {
        $this->veteran = Veteran::where('id', $id)->first();

        if($this->veteran['death_dt']) {
            $this->dates_str = $this->veteran['birth_dt'] . ' - ' . $this->veteran['death_dt'];
        } elseif ($this->veteran['birth_dt']) {
            $this->dates_str = 'р. ' . $this->veteran['birth_dt'];
        } else {
            $this->dates_str = '';
        }

    }
}
