<?php

namespace App\Http\Livewire\ManagerData;

use Livewire\Component;

use App\Models\Customer;

use App\Models\Approval;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

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

    public function render()
    {
        $customers = Customer::where('created_at', 'like', '%' . $this->date_picker . '%')
        ->paginate(10);

        return view('livewire.manager-data.customers-component', compact('customers'))->layout('layouts.default');
    }
}
