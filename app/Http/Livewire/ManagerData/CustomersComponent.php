<?php

namespace App\Http\Livewire\ManagerData;

use Livewire\Component;

use App\Models\Customer;
use App\Models\Approval;

use Livewire\WithPagination;

class CustomersComponent extends Component
{

    public $message= '';
    public $user_id= '';


    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;


    //Delete Customer//
    public function delete_personal($id)
    {

        $delete_personal = Customer::find($id);
        $delete_personal->delete();

        $this->dispatchBrowserEvent('swal',[
            'position'=> 'centered',
            'icon'=> 'success',
            'title'=> 'Customer berhasil di Hapus!',
            'showConfirmButton'=> false,
            'timer'=> 1500
        ]);
    }

    //rejected//
    public function approved()
    {
        $this->message = "Approved";


        $this->dispatchBrowserEvent('swal',[
            'position'=> 'centered',
            'icon'=> 'success',
            'title'=> 'Approved Customer telah berhasil!',
            'showConfirmButton'=> false,
            'timer'=> 1500
        ]);
    }

    //approved//
    public function rejected()
    {
        $this->message = 'Rejected';

        $this->dispatchBrowserEvent('swal',[
            'position'=> 'centered',
            'icon'=> 'success',
            'title'=> 'Rejected Customer telah berhasil!',
            'showConfirmButton'=> false,
            'timer'=> 1500
        ]);
    }

    public function render()
    {
        $customers = Customer::where('customer_id', 'like', '%'.$this->search.'%')
        ->orwhere('name', 'like', '%'.$this->search.'%')
        ->orwhere('class', 'like', '%'.$this->search.'%')
        ->paginate(5);

        return view('livewire.manager-data.customers-component',compact('customers'))->layout('layouts.default');
    }

}
