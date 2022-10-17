<?php

namespace App\Http\Livewire\ManagerData;

use Livewire\Component;

use App\Models\Customer;

use App\Models\Approval;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\URL;

class CustomersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $date_picker;

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

    public function approved_status($id)
    {
        $canSavedData = false;
        try {
            $customerFindByID = Customer::find($id);

            $fileName = URL::to('assets/pdf/' . $id . '-form.pdf');

            // Download PDF
            $data = [
                'customer' => $customerFindByID
            ];

            // Send Email to Customer
            $to_email = $customerFindByID->email;
            $to_emailSales = "";
            if ($customerFindByID->reference_id != null) {
                $response = Http::withHeaders([
                    'X-Api-Key' => 'lfHvJBMHkoqp93YR:4d059474ecb431eefb25c23383ea65fc'
                ])->get('https://legacy.is5.nusa.net.id/employees/' . $customerFindByID->reference_id);

                if ($response->successful()) {
                    $decodeResponse = json_decode($response->body());

                    $to_emailSales = $decodeResponse->email;
                }
            }

            $textingEmail = "Data Formulir Digital Registrasi Anda Telah Disetujui";

            // dd($to_email, $to_emailSales);
            // try {
            Mail::raw($textingEmail, function ($message) use ($to_email, $to_emailSales, $data, $id) {
                $message->to($to_email)->subject('Persetujuan Formulir Registrasi Internet');
                if ($to_emailSales != "") {
                    $message->to($to_emailSales)->subject('Persetujuan Formulir Registrasi Internet');
                }
                $message->from('reg@nusa.net.id', 'Nusanet Medan');
                $pdf = Pdf::loadView('report', $data);
                $message->attachData($pdf->output(), $id . '-form.pdf');
            });
            // } catch (\Throwable $th) {
            //     dd($th->getMessage(), $to_email);
            // }


            $canSavedData = true;
        } catch (\Throwable $th) {
            $canSavedData = false;
        }

        if ($canSavedData) {
            $approved_status = Approval::find($id);
            $approved_status->isApproved = true;
            $approved_status->isRejected = false;
            $approved_status->save();


            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Approved Customer telah berhasil!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Approved Customer gagal!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function rejected_status($id)
    {
        $rejected_status = Approval::find($id);
        $rejected_status->isRejected = true;
        $rejected_status->isApproved = false;
        $rejected_status->save();

        $this->dispatchBrowserEvent('swal', [
            'position' => 'centered',
            'icon' => 'success',
            'title' => 'Rejected Customer telah berhasil!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }

    public function exportPDF($id)
    {
        return redirect()->to('/manager-data-customers/' . $id . '/print');
    }

    public function showPrint($id)
    {
        $customerFindByID = Customer::find($id);
        $data = [
            'customer' => $customerFindByID
        ];

        $pdf = Pdf::loadView('report', $data);
        return $pdf->stream();
    }

    public function render()
    {
        $customersAdmin = Customer::all();

        foreach ($customersAdmin as $key => $value) {
            if ($value->reference_id != null) {
                $response = Http::withHeaders([
                    'X-Api-Key' => 'lfHvJBMHkoqp93YR:4d059474ecb431eefb25c23383ea65fc'
                ])->get('https://legacy.is5.nusa.net.id/employees/' . $value->reference_id);

                if ($response->successful()) {
                    $decodeResponse = json_decode($response->body());

                    $value->id_sales = $decodeResponse->id;
                    $value->nama_sales = $decodeResponse->name;
                    $value->email_sales = $decodeResponse->email;
                }
            }
        }

        return view('livewire.manager-data.customers-component', ['customers' => $customersAdmin])->layout('layouts.default');
    }
}
