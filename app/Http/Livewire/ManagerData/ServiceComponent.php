<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\ServiceList;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $pengguna_search;

    public $nama_pengguna_create,
           $service_pengguna_create;

    public $nama_pengguna_set,
           $service_pengguna_set,
           $id_pengguna_set;

    public $nama_pengguna_delete,
           $service_pengguna_delete,
           $id_pengguna_delete;


    // Create User//
    public function create_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_create' => 'required|unique:services_list,service_name|min:3|max:50',
                'service_pengguna_create' => 'required|min:3|max:50',

            ]);

            $create_pengguna = new ServiceList();
            $create_pengguna->service_name = $this->nama_pengguna_create;
            $create_pengguna->service_price = $this->service_pengguna_create;
            $create_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Service berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            $this->reset([
                'nama_pengguna_create',
                'service_pengguna_create',
            ]);

        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Sorry Service Name Duplicate!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }


    //Edit User//
    public function pengguna_edit($id)
    {
        $pengguna_edit = ServiceList::find($id);
        $this->nama_pengguna_set = $pengguna_edit->service_name;
        $this->service_pengguna_set = $pengguna_edit->service_price;
        $this->id_pengguna_set = $pengguna_edit->id;

    }

    public function set_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_set' => 'required|string',
                'service_pengguna_set' => 'required|string',

            ]);

            $set_pengguna = ServiceList::where('id', $this->id_pengguna_set)->first();
            $set_pengguna->service_name = $this->nama_pengguna_set;
            $set_pengguna->service_price = $this->service_pengguna_set;
            $set_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Edit Service berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Edit Service gagal tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    //Delete User//
    public function pengguna_destroy($id)
    {
        $pengguna_destroy = ServiceList::find($id);
        $this->nama_pengguna_delete = $pengguna_destroy->service_name;
        $this->service_pengguna_delete = $pengguna_destroy->service_price;
        $this->id_pengguna_delete = $pengguna_destroy->id;
    }

    public function delete_pengguna()
    {
        try {
            $delete_pengguna = ServiceList::where('id', $this->id_pengguna_delete)->first();
            $delete_pengguna->delete();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => ' Delete Service berhasil terhapus!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
            $this->reset([
                'nama_pengguna_delete'
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Delete Service gagal terhapus!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function render()
    {
        $services = Servicelist::where('service_name', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('service_price', 'like', '%' . $this->pengguna_search . '%')
        ->paginate(10);
        return view('livewire.manager-data.service-component',compact('services'))->layout('layouts.default');
    }
}
