<?php

namespace App\Http\Livewire\ManagerData;

use Livewire\Component;

use App\Exports\ManagerData\ExportCustomer;

use Excel;

use App\Models\Customer;

use Livewire\WithPagination;

class CustomersComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;


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


    public function customer_download()
    {
        try {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'success',
                'title'=> 'Customer Berhasil Terdownload!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);

           return Excel::download(new ExportCustomer,'DataCustomer.xlsx');
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'error',
                'title'=> 'Customer gagal terdownload!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);
        }
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
