<?php

namespace App\Http\Livewire\Charts;

use Livewire\Component;

class ChartsComponent extends Component
{
    public function render()
    {
        return view('livewire.charts.charts-component')->layout('layouts.default');
    }
}
