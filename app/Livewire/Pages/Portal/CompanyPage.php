<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Company;
use Livewire\Component;

class CompanyPage extends Component
{
    public $company;

    public function render()
    {
        return view('livewire.pages.portal.company-page');
    }

    public function mount($id) {
        $this->company = Company::where('id', $id)->with('veteran')->first();
    }
}
