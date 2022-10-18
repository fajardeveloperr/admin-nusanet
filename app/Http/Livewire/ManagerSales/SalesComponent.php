<?php

namespace App\Http\Livewire\ManagerSales;

use App\Models\Customer;
use Livewire\WithPagination;
use App\Exports\ManagerData\ExportCustomer;
use App\Models\PromoList;
use App\Models\Service;
use Carbon\Carbon;
use Excel;
use Livewire\Component;

class SalesComponent extends Component
{

    public $id_approved;

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;
    public $id_survey;
    public $catatan_lain;
    public $date_picker;
    public $promoCode;

    public function setKodePromo($id)
    {
        $this->validate(
            [
                'promoCode' => 'required'
            ],
            [
                'promoCode.required' => 'Field Kode Promo Wajib Diisi'
            ]
        );

        $QueryTOP = "Bulanan";
        $CustomerDataFetch = Customer::where('customer_id', $id)->first();
        $ServicePackage = json_decode($CustomerDataFetch->service->service_package)[0];
        $PackageName = explode(" ", $ServicePackage->service_name)[0] . ' ' . explode(" ", $ServicePackage->service_name)[1];
        $TermOfPayment = $ServicePackage->termofpaymentDeals;
        if ($TermOfPayment === "12 Bulan") {
            $QueryTOP = "Tahunan";
        }

        $PromoDataFetch = PromoList::where(function ($query) use ($PackageName, $QueryTOP) {
            $query->where('promo_code', $this->promoCode)
                ->where('package_name', 'like', '%' . $PackageName . '%')
                ->where('package_top', $QueryTOP);
        })->whereDate('activate_date', '<=', Carbon::now())
            ->whereDate('expired_date', '>=', Carbon::now());

        if ($PromoDataFetch->count() > 0) {
            $DataPromo = $PromoDataFetch->get()->toArray()[0];
            $StatusPotonganBulanan = $DataPromo['monthly_cut_status'];
            if ($StatusPotonganBulanan == "Penambahan") {
                // Perhitungan Penambahan Bulan
                $MonthlyCutPromo = $DataPromo['monthly_cut'] == null ? 0 : $DataPromo['monthly_cut'];
                $DicountCutPromo = $DataPromo['discount_cut'] == null ? 0 : $DataPromo['discount_cut'];

                // Pemotongan Bulan
                $ServiceTOP = explode(" ", $ServicePackage->termofpaymentDeals);
                $TotalBulanTOP = ($ServiceTOP[0] + $MonthlyCutPromo) . ' Bulan';
                if ($ServiceTOP[0] + $MonthlyCutPromo == 0) {
                    return redirect()->back()->with('promoErrMessage', 'Kode Promo tidak ditemukan');
                }

                // Pemotongan Harga Layanan
                $ServicePrice = $ServicePackage->service_price;
                $HargaSetelahPPN = ($ServicePrice + ($ServicePrice * (11 / 100)));
                $NewServicePrice = $HargaSetelahPPN - ($HargaSetelahPPN * ($DicountCutPromo / 100));

                // Save Data to Database
                $ServicePackage->service_price = $NewServicePrice;
                $ServicePackage->termofpaymentDeals = $TotalBulanTOP;
                $ServicePackage->isPromo = true;
                $CustomerFetchOne = Customer::where('customer_id', $id)->first();
                $CustomerID = $CustomerFetchOne->id;

                $CustServiceData = Service::find($CustomerID);
                $CustServiceData->service_package = json_encode([$ServicePackage]);
                $CustServiceData->save();
            } elseif ($StatusPotonganBulanan == "Pengurangan") {
                // Perhitungan Pengurangan Bulan
                $MonthlyCutPromo = $DataPromo['monthly_cut'] == null ? 0 : $DataPromo['monthly_cut'];
                $DicountCutPromo = $DataPromo['discount_cut'] == null ? 0 : $DataPromo['discount_cut'];

                // Pemotongan Bulan
                $ServiceTOP = explode(" ", $ServicePackage->termofpaymentDeals);
                $TotalBulanTOP = ($ServiceTOP[0] - $MonthlyCutPromo) . ' Bulan';
                if ($ServiceTOP[0] - $MonthlyCutPromo == 0) {
                    return redirect()->back()->with('promoErrMessage', 'Kode Promo tidak ditemukan');
                }

                // Pemotongan Harga Layanan
                $ServicePrice = $ServicePackage->service_price;
                $HargaSetelahPPN = ($ServicePrice + ($ServicePrice * (11 / 100)));
                $NewServicePrice = $HargaSetelahPPN - ($HargaSetelahPPN * ($DicountCutPromo / 100));

                // Save Data to Database
                $ServicePackage->service_price = $NewServicePrice;
                $ServicePackage->termofpaymentDeals = $TotalBulanTOP;
                $ServicePackage->isPromo = true;
                $CustomerFetchOne = Customer::where('customer_id', $id)->first();
                $CustomerID = $CustomerFetchOne->id;

                $CustServiceData = Service::find($CustomerID);
                $CustServiceData->service_package = json_encode([$ServicePackage]);
                $CustServiceData->save();
            }
        } else {
            return redirect()->back()->with('promoErrMessage', 'Kode Promo tidak ditemukan');
        }
    }

    public function add_extend_note($id)
    {
        $updatePersonal = Customer::where('customer_id', $id)->first();
        $updatePersonal->extend_note = $this->catatan_lain;
        $updatePersonal->survey_id = $this->id_survey;
        $updatePersonal->save();

        $this->dispatchBrowserEvent('swal', [
            'position' => 'centered',
            'icon' => 'success',
            'title' => 'Customer berhasil di update!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }

    public function delete_personal($id)
    {

        $delete_personal = Customer::find($id);
        $delete_personal->delete();

        $this->dispatchBrowserEvent('swal', [
            'position' => 'centered',
            'icon' => 'success',
            'title' => 'Customer berhasil di Hapus!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }


    public function customer_download()
    {
        try {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Customer Berhasil Terdownload!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            return Excel::download(new ExportCustomer, 'DataCustomer.xlsx');
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Customer gagal terdownload!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }



    public function render()
    {
        $customers = Customer::where('reference_id', Auth()->user()->employee_id)
            ->get();

        return view('livewire.manager-sales.sales-component', compact('customers'))->layout('layouts.default');
    }
}
