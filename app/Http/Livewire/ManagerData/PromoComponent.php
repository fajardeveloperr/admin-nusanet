<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\PromoList;
use Illuminate\Http\Request;
use Livewire\Component;

class PromoComponent extends Component
{
    public $kode_promo_admin;
    public $monthly_discount_admin;
    public $discount_admin;
    public $start_promo_period_datetime;
    public $end_promo_period_datetime;
    protected $listeners = [
        'alert' => '$refresh',
    ];

    public function create_promo()
    {
        try {
            $this->validate(
                [
                    'kode_promo_admin' => 'required',
                    'monthly_discount_admin' => 'required|min:1|max:12',
                    'discount_admin' => 'required|min:1|max:100',
                    'start_promo_period_datetime' => 'required',
                    'end_promo_period_datetime' => 'required'
                ],
                [
                    'kode_promo_admin.required' => 'Field Kode Promo Wajib Diisi',
                    'monthly_discount_admin.required' => 'Field Potongan Bulanan Wajib Diisi',
                    'monthly_discount_admin.min' => 'Minimal Potongan Bulanan Adalah 1',
                    'monthly_discount_admin.max' => 'Maksimal Potongan Bulanan adalah 12',
                    'discount_admin.required' => 'Field Potongan Diskon Wajib Diisi',
                    'discount_admin.min' => 'Minimal Potongan Diskon Adalah 1',
                    'discount_admin.max' => 'Maksimal Potongan Diskon Adalah 100',
                    'start_promo_period_datetime.required' => 'Field Periode Masa Awal Promo Wajib Diisi',
                    'end_promo_period_datetime.required' => 'Field Periode Masa Akhir Promo Wajib Diisi'
                ]
            );

            $newPromo = new PromoList();
            $newPromo->promo_code = $this->kode_promo_admin;
            $newPromo->percentage_discount = $this->discount_admin;
            $newPromo->monthly_discount = $this->monthly_discount_admin;
            $newPromo->activate_date = $this->start_promo_period_datetime;
            $newPromo->expired_date = $this->end_promo_period_datetime;
            $newPromo->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Data Promo berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            $this->reset([
                'kode_promo_admin',
                'monthly_discount_admin',
                'discount_admin',
                'start_promo_period_datetime',
                'end_promo_period_datetime',
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Maaf, Data Promo Yang Anda Masukkan Sudah Ada!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function hapusDataPromo($id)
    {
        try {
            $promoFetch = PromoList::find($id);
            $promoFetch->delete();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Data Promo berhasil dihapus!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Maaf, Data Promo Yang Anda Masukkan Sudah Ada!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
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
