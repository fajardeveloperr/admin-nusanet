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

    public $nama_service_set,
           $speed_service_set,
           $price_service_set,
           $category_service_set,
           $top_service_set,
           $type_service_set,
           $id_service_set;

    public $nama_service_delete,
           $speed_service_delete,
           $price_service_delete,
           $category_service_delete,
           $top_service_delete,
           $type_service_delete,
           $id_service_delete;


    // Create Service//
    public function create_service()
    {
        try {
            $this->validate([
                // 'nama_service_create' => 'required|unique:services_list,package_name|min:3|max:50',
                'nama_service_create' => 'required|min:3|max:50',
                'speed_service_create' => 'required|min:3|max:50',
                'price_service_create' => 'required|min:3|max:50',
                'category_service_create' => 'required|min:3|max:50',
                'top_service_create' => 'required|min:3|max:50',
                'type_service_create' => 'required|min:3|max:50'

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
                'type_service_create'
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
    public function service_edit($id)
    {
        $service_edit = ServicesList::find($id);
        $this->nama_service_set = $service_edit->package_name;
        $this->speed_service_set = $service_edit->package_speed;
        $this->price_service_set = $service_edit->package_price;
        $this->category_service_set = $service_edit->package_categories;
        $this->top_service_set = $service_edit->package_top;
        $this->type_service_set = $service_edit->package_type;
        $this->id_service_set = $service_edit->id;

    }

    public function set_service()
    {
        try {
            $this->validate([
                'nama_service_set' =>'required|string',
                'speed_service_set' =>'required|string',
                'price_service_set' =>'required|string',
                'category_service_set' =>'required|string',
                'top_service_set' =>'required|string',
                'type_service_set' =>'required|string',
            ]);

            $set_service = ServicesList::where('id', $this->id_service_set)->first();
            $set_service->package_name = $this->nama_service_set;
            $set_service->package_speed = $this->speed_service_set;
            $set_service->package_price = $this->price_service_set;
            $set_service->package_categories = $this->category_service_set;
            $set_service->package_top = $this->top_service_set;
            $set_service->package_type = $this->type_service_set;
            $set_service->save();

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
    public function service_destroy($id)
    {
        $service_destroy = ServicesList::find($id);
        $this->nama_service_delete = $service_destroy->package_name;
        $this->speed_service_delete = $service_destroy->package_speed;
        $this->price_service_delete = $service_destroy->package_price;
        $this->category_service_delete = $service_destroy->package_categories;
        $this->top_service_delete = $service_destroy->package_top;
        $this->type_service_delete = $service_destroy->package_type;
        $this->id_service_delete = $service_destroy->id;
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
                'nama_service_delete',
                'speed_service_delete',
                'price_service_delete',
                'category_service_delete',
                'top_service_delete',
                'type_service_delete',
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
        $services = Serviceslist::where('package_name', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_categories', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_speed', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_price', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_top', 'like', '%' . $this->pengguna_search . '%')
        ->orwhere('package_type', 'like', '%' . $this->pengguna_search . '%')
        ->paginate(10);
        return view('livewire.manager-data.service-component',compact('services'))->layout('layouts.default');
    }
}
