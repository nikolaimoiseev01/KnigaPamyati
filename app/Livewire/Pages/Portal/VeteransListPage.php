<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Company;
use App\Models\FederalDistrict;
use App\Models\Veteran;
use Livewire\Component;
use Livewire\WithPagination;

class VeteransListPage extends Component
{
    public $districts;
    public $companies;
    #[Url]
    public $search;
    public $district;
    public $company;

    public $take_cnt = 10;
    public $veterans;

    use WithPagination;

    public function render()
    {

        $this->veterans = Veteran::when($this->company, function ($q) {
            return $q->whereIn('company_id', (array)$this->company);
        })
            ->when($this->district, function ($q) {
                return $q->whereHas('company', function ($q) {
                    $q->where('federal_district_id', $this->district);
                });
            })
            ->when($this->search, function ($q) {
                return $q->whereRaw('LOWER(name) LIKE ?', ["%{$this->search}%"])
                    ->orWhereRaw('LOWER(surname) LIKE ?', ["%{$this->search}%"])
                    ->orWhereRaw('LOWER(thirdname) LIKE ?', ["%{$this->search}%"]);
            })
            ->take($this->take_cnt)
            ->get();
        return view('livewire.pages.portal.veterans-list-page');
    }

    public function mount()
    {
        $this->districts = FederalDistrict::all();
        $this->companies = Company::all();
    }

    public function load_more()
    {
        $this->take_cnt += 10;
    }

    public function update_list()
    {
//        dd($this->district);
//        $this->dispatch('$refresh');
//        dd('tes2t');
    }
}
