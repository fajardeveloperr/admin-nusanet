<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\PromoList;
use Illuminate\Http\Request;
use Livewire\Component;

class PromoComponent extends Component
{
    public $kode_promo_admin;

    public function create_promo()
    {
        dd($this->all());
    }

    public function render()
    {
        $datas = [
            'titlePage' => 'Data List Promo',
            'dataPromo' => PromoList::all()
        ];

        return view('livewire.manager-data.promo-component', $datas)->layout('layouts.default');
    }
}
