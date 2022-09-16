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

    public $nama_service_create,
           $speed_service_create,
           $price_service_create,
           $category_service_create,
           $top_service_create,
           $type_service_create;

    public $nama_pengguna_set,
           $service_pengguna_set,
           $category_pengguna_set,
           $period_pengguna_set,
           $id_pengguna_set;

    public $nama_pengguna_delete,
           $service_pengguna_delete,
           $category_pengguna_delete,
           $period_pengguna_delete,
           $id_service_delete;


    // Create Service//
    public function create_service()
    {
        try {
            $this->validate([
                'nama_service_create' => 'required|unique:services_list,package_name|min:3|max:50',
                'speed_service_create' => 'required|min:3|max:50',
                'price_service_create' => 'required|min:3|max:50',
                'category_service_create' => 'required|min:3|max:50',
                'top_service_create' => 'required|min:3|max:50',
                'type_service_create' => 'required|min:3|max:50',

            ]);

            $create_service = new ServicesList();
            $create_service->package_name = $this->nama_service_create;
            $create_service->package_speed = $this->speed_service_create;
            $create_service->package_price = $this->price_service_create;
            $create_service->package_categories = $this->category_service_create;
            $create_service->package_top = $this->top_service_create;
            $create_service->package_type = $this->type_service_create;
            $create_service->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Service berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            $this->reset([
                'nama_service_create',
                'speed_service_create',
                'price_service_create',
                'category_service_create',
                'top_service_create',
                'type_service_create',
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

    public function delete_service()
    {
        try {
            $delete_service = ServicesList::where('id', $this->id_service_delete)->first();
            $delete_service->delete();

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
        $services = Serviceslist::where('package_categories', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_name', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_speed', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_price', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_top', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_type', 'like', '%' . $this->pengguna_search . '%')
        ->paginate(10);
        return view('livewire.manager-data.service-component',compact('services'))->layout('layouts.default');
    }
}
