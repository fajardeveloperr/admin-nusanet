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

    public $setkode_promo_admin;
    public $setmonthly_discount_admin;
    public $setdiscount_admin;
    public $setstart_promo_period_datetime;
    public $setend_promo_period_datetime;
    public $id_promo_set;
    protected $listeners = [
        'promo_edit' => '$refresh',
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

    //Edit Promo//
    public function promo_edit($id)
    {
        $promo_edit = PromoList::find($id);
        $this->setkode_promo_admin = $promo_edit->promo_code;
        $this->setmonthly_discount_admin = $promo_edit->monthly_discount;
        $this->setdiscount_admin = $promo_edit->percentage_discount;
        $this->setstart_promo_period_datetime = $promo_edit->activate_date;
        $this->setend_promo_period_datetime = $promo_edit->expired_date;
        $this->id_promo_set = $promo_edit->id;

        $this->dispatchBrowserEvent('refreshListener');
    }

    public function set_promo()
    {
        try {
            $this->validate([
                'setkode_promo_admin' => 'required|string',
                'setmonthly_discount_admin' => 'required|string',
                'setdiscount_admin' => 'required|string',
                'setstart_promo_period_datetime' => 'required|string',
                'setend_promo_period_datetime' => 'required|string',
            ]);

            $set_promo = PromoList::where('id', $this->id_promo_set)->first();
            $set_promo->promo_code = $this->setkode_promo_admin;
            $set_promo->monthly_discount = $this->setmonthly_discount_admin;
            $set_promo->percentage_discount = $this->setdiscount_admin;
            $set_promo->activate_date = $this->setstart_promo_period_datetime;
            $set_promo->expired_date = $this->setend_promo_period_datetime;
            $set_promo->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Edit Promo berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Edit Promo gagal tersimpan!',
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
