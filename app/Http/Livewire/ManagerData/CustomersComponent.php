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
        $approved_status = Approval::find($id);
        $approved_status->isApproved = true;
        $approved_status->isRejected = false;
        $approved_status->save();

        $customerFindByID = Customer::find($id);

        // Send Email to Customer
        $to_name = $customerFindByID->name;
        $to_email = $customerFindByID->email;
        $data = [];
        Mail::send('welcome', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Approval Notification!');
            $message->from('admin@adriel-creation.id', 'Nusanet Medan');
        });

        // if ($customerFindByID->reference_id != null) {
        // }


        $this->dispatchBrowserEvent('swal', [
            'position' => 'centered',
            'icon' => 'success',
            'title' => 'Approved Customer telah berhasil!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
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
        $customers = Customer::where('created_at', 'like', '%' . $this->date_picker . '%')
            ->paginate(10);

        foreach ($customers as $key => $value) {
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

        return view('livewire.manager-data.customers-component', compact('customers'))->layout('layouts.default');
    }
}
