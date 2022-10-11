<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\PromoList;
use App\Models\ServicesList;
use Illuminate\Http\Request;
use Livewire\Component;

class PromoComponent extends Component
{
    public $package_name_admin = null;
    public $package_top_admin = null;

    public $kode_promo_admin;
    public $monthly_discount_admin;
    public $monthly_discount_status_admin;
    public $discount_admin;
    public $start_promo_period_datetime;
    public $end_promo_period_datetime;

    public $setkode_promo_admin;
    public $setmonthly_discount_admin;
    public $setmonthly_discount_status_admin;
    public $setdiscount_admin;
    public $setstart_promo_period_datetime;
    public $setend_promo_period_datetime;
    public $id_promo_set;
    protected $listeners = [
        'promo_edit' => '$refresh',
    ];

    public function create_promo()
    {
        $this->validate(
            [
                'setkode_promo_admin' => 'required',
                'package_name_admin' => 'required',
                'package_top_admin' => 'required',
                'monthly_discount_admin' => 'required|min:1|max:12',
                'discount_admin' => 'required|min:1|max:100',
                'start_promo_period_datetime' => 'required',
                'end_promo_period_datetime' => 'required'
            ],
            [
                'setkode_promo_admin.required' => 'Field Kode Promo Wajib Diisi',
                'package_name_admin.required' => 'Field Nama Paket Wajib Diisi',
                'package_top_admin.required' => 'Field TOP Paket Wajib Diisi',
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

        try {
            $newPromo = new PromoList();
            $newPromo->promo_code = $this->setkode_promo_admin;
            $newPromo->package_name = $this->package_name_admin;
            $newPromo->package_top = $this->package_top_admin;
            $newPromo->discount_cut = $this->discount_admin;
            $newPromo->monthly_cut = $this->monthly_discount_admin;
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
                'setkode_promo_admin',
                'package_name_admin',
                'package_top_admin',
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
        $this->package_name_admin = $promo_edit->package_name;
        $this->package_top_admin = $promo_edit->package_top;
        $this->setmonthly_discount_admin = $promo_edit->monthly_cut;
        $this->setdiscount_admin = $promo_edit->discount_cut;
        $this->setstart_promo_period_datetime = $promo_edit->activate_date;
        $this->setend_promo_period_datetime = $promo_edit->expired_date;
        $this->id_promo_set = $promo_edit->id;

        $this->dispatchBrowserEvent('refreshListener');
    }

    public function set_promo()
    {
        $this->validate(
            [
                'setkode_promo_admin' => 'required',
                'package_name_admin' => 'required',
                'package_top_admin' => 'required',
                'setmonthly_discount_admin' => 'required|min:1|max:12',
                'setdiscount_admin' => 'required|min:1|max:100',
                'setstart_promo_period_datetime' => 'required',
                'setend_promo_period_datetime' => 'required'
            ],
            [
                'setkode_promo_admin.required' => 'Field Kode Promo Wajib Diisi',
                'package_name_admin.required' => 'Field Nama Paket Wajib Diisi',
                'package_top_admin.required' => 'Field TOP Paket Wajib Diisi',
                'setmonthly_discount_admin.required' => 'Field Potongan Bulanan Wajib Diisi',
                'setmonthly_discount_admin.min' => 'Minimal Potongan Bulanan Adalah 1',
                'setmonthly_discount_admin.max' => 'Maksimal Potongan Bulanan adalah 12',
                'setdiscount_admin.required' => 'Field Potongan Diskon Wajib Diisi',
                'setdiscount_admin.min' => 'Minimal Potongan Diskon Adalah 1',
                'setdiscount_admin.max' => 'Maksimal Potongan Diskon Adalah 100',
                'setstart_promo_period_datetime.required' => 'Field Periode Masa Awal Promo Wajib Diisi',
                'setend_promo_period_datetime.required' => 'Field Periode Masa Akhir Promo Wajib Diisi'
            ]
        );

        try {
            $set_promo = PromoList::where('id', $this->id_promo_set)->first();
            $set_promo->promo_code = $this->setkode_promo_admin;
            $set_promo->package_name = $this->package_name_admin;
            $set_promo->package_top = $this->package_top_admin;
            $set_promo->discount_cut = $this->setdiscount_admin;
            $set_promo->monthly_cut = $this->setmonthly_discount_admin;
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
        $fetchDataService = ServicesList::all();
        $dataPaket = [];
        foreach ($fetchDataService as $key => $value) {
            array_push($dataPaket, $value->package_name);
        }

        $datas = [
            'titlePage' => 'Data List Promo',
            'dataPromo' => PromoList::all(),
            'dataServiceList' => array_count_values($dataPaket)
        ];

        return view('livewire.manager-data.promo-component', $datas)->layout('layouts.default');
    }
}
