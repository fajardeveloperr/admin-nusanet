<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\ServicesList;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $pengguna_search;

    public $nama_pengguna_create,
           $service_pengguna_create,
           $category_pengguna_create,
           $period_pengguna_create;

    public $nama_pengguna_set,
           $service_pengguna_set,
           $category_pengguna_set,
           $period_pengguna_set,
           $id_pengguna_set;

    public $nama_pengguna_delete,
           $service_pengguna_delete,
           $category_pengguna_delete,
           $period_pengguna_delete,
           $id_pengguna_delete;


    // Create Service//
    public function create_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_create' => 'required|unique:services_list,package_name|min:3|max:50',
                'service_pengguna_create' => 'required|min:3|max:50',
                'category_pengguna_create' => 'required|min:3|max:50',
                'period_pengguna_create' => 'required|min:3|max:50',

            ]);

            $create_pengguna = new ServicesList();
            $create_pengguna->package_name = $this->nama_pengguna_create;
            $create_pengguna->package_price = $this->service_pengguna_create;
            $create_pengguna->category = $this->category_pengguna_create;
            $create_pengguna->period = $this->period_pengguna_create;
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
                'category_pengguna_set',
                'period_pengguna_set',
            ]);

        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Maaf Ada Yang Duplicate!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }


    //Edit Service//
    public function pengguna_edit($id)
    {
        $pengguna_edit = ServicesList::find($id);
        $this->nama_pengguna_set = $pengguna_edit->package_name;
        $this->service_pengguna_set = $pengguna_edit->package_price;
        $this->category_pengguna_set = $pengguna_edit->category;
        $this->period_pengguna_set = $pengguna_edit->period;
        $this->id_pengguna_set = $pengguna_edit->id;

    }

    public function set_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_set' => 'required|string',
                'service_pengguna_set' => 'required|string',
                'category_pengguna_set' => 'required|string',
                'period_pengguna_set' => 'required|string',

            ]);

            $set_pengguna = ServicesList::where('id', $this->id_pengguna_set)->first();
            $set_pengguna->package_name  = $this->nama_pengguna_set;
            $set_pengguna->package_price = $this->service_pengguna_set;
            $set_pengguna->category = $this->category_pengguna_set;
            $set_pengguna->period = $this->period_pengguna_set;
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

    //Delete Service//
    public function pengguna_destroy($id)
    {
        $pengguna_destroy = ServicesList::find($id);
        $this->nama_pengguna_delete = $pengguna_destroy->package_name;
        $this->service_pengguna_delete = $pengguna_destroy->package_price;
        $this->category_pengguna_delete = $pengguna_destroy->category;
        $this->period_pengguna_delete = $pengguna_destroy->period;
        $this->id_pengguna_delete = $pengguna_destroy->id;
    }

    public function delete_pengguna()
    {
        try {
            $delete_pengguna = ServicesList::where('id', $this->id_pengguna_delete)->first();
            $delete_pengguna->delete();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => ' Delete Service berhasil terhapus!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
            $this->reset([
                'nama_pengguna_delete',
                'service_pengguna_delete',
                'category_pengguna_delete',
                'period_pengguna_delete',
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
        $services = Serviceslist::where('category', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_name', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_price', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('period', 'like', '%' . $this->pengguna_search . '%')
        ->paginate(10);
        return view('livewire.manager-data.service-component',compact('services'))->layout('layouts.default');
    }
}
