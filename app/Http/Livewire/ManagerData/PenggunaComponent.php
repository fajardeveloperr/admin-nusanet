<?php

namespace App\Http\Livewire\ManagerData;

use App\Models\User;
use Excel;
use App\Exports\ManagerData\ExportPengguna;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class PenggunaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $pengguna_search;

    public $nama_pengguna_create,
        $email_pengguna_create,
        $password_pengguna_create,
        $konfirmasi_password_pengguna_create,
        $utype_pengguna_create;

    public $nama_pengguna_set,
        $email_pengguna_set,
        $password_pengguna_set,
        $konfirmasi_password_pengguna_set,
        $utype_pengguna_set,
        $id_pengguna_set;

    public $nama_pengguna_delete,
        $email_pengguna_delete,
        $password_pengguna_delete,
        $konfirmasi_password_pengguna_delete,
        $utype_pengguna_delete,
        $id_pengguna_delete;


    public function create_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_create' => 'required|min:3|max:50',
                'email_pengguna_create' => 'required|email|unique:users,email',
                'password_pengguna_create' => 'min:6|required_with:konfirmasi_password_pengguna_create|same:konfirmasi_password_pengguna_create',
                'konfirmasi_password_pengguna_create' => 'min:6',
                'utype_pengguna_create' => 'required|string',

            ]);

            $create_pengguna = new User();
            $create_pengguna->name = $this->nama_pengguna_create;
            $create_pengguna->email = $this->email_pengguna_create;
            $create_pengguna->password = Hash::make($this->password_pengguna_create);
            $create_pengguna->utype = $this->utype_pengguna_create;
            $create_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Pengguna berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            $this->reset([
                'nama_pengguna_create',
                'email_pengguna_create',
                'password_pengguna_create',
                'konfirmasi_password_pengguna_create',
                'utype_pengguna_create',
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Pengguna gagal tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function pengguna_edit($id)
    {
        $pengguna_edit = User::find($id);
        $this->nama_pengguna_set = $pengguna_edit->name;
        $this->email_pengguna_set = $pengguna_edit->email;
        $this->password_pengguna_set = $pengguna_edit->password;
        $this->password_pengguna_set = $pengguna_edit->password;
        $this->konfirmasi_password_pengguna_set = $pengguna_edit->password;
        $this->utype_pengguna_set = $pengguna_edit->utype;
        $this->id_pengguna_set = $pengguna_edit->id;

        $this->dispatchBrowserEvent('swal', [
            'position' => 'top-right',
            'icon' => 'success',
            'title' => 'Pengguna berhasil terdeteksi!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }

    public function set_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_set' => 'required|string',
                'email_pengguna_set' => 'required|string',
                'utype_pengguna_set' => 'required|string',
                'password_pengguna_set' => 'required|string|min:8',
                'konfirmasi_password_pengguna_set' => 'required|string'

            ]);

            $set_pengguna = User::where('id', $this->id_pengguna_set)->first();
            $set_pengguna->name = $this->nama_pengguna_set;
            $set_pengguna->email = $this->email_pengguna_set;
            $set_pengguna->password = $this->password_pengguna_set;
            $set_pengguna->utype = $this->utype_pengguna_set;
            $set_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Pengguna berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Pengguna gagal tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function pengguna_destroy($id)
    {
        $pengguna_destroy = User::find($id);
        $this->nama_pengguna_delete = $pengguna_destroy->name;
        $this->email_pengguna_delete = $pengguna_destroy->email;
        $this->password_pengguna_delete = $pengguna_destroy->password;
        $this->konfirmasi_password_pengguna_delete = $pengguna_destroy->password;
        $this->utype_pengguna_delete = $pengguna_destroy->utype;
        $this->id_pengguna_delete = $pengguna_destroy->id;

        $this->dispatchBrowserEvent('swal', [
            'position' => 'top-right',
            'icon' => 'success',
            'title' => 'Pengguna berhasil terdeteksi!',
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    }

    public function delete_pengguna()
    {
        try {
            $delete_pengguna = User::where('id', $this->id_pengguna_delete)->first();
            $delete_pengguna->delete();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Pengguna berhasil terhapus!',
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
                'title' => 'Pengguna gagal terhapus!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function pengguna_download()
    {
        try {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Pengguna Berhasil Terdownload!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);

            return Excel::download(new ExportPengguna, 'DataPengguna.xlsx');
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Pengguna gagal terdownload!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    public function render()
    {

        $pengguna = User::where('name', 'like', '%' . $this->pengguna_search . '%')
            ->orwhere('email', 'like', '%' . $this->pengguna_search . '%')
            ->orwhere('name', 'like', '%' . $this->pengguna_search . '%')
            ->orwhere('utype', 'like', '%' . $this->pengguna_search . '%')
            ->paginate(10);

        return view('livewire.manager-data.pengguna-component', compact(
            'pengguna'
        ))->layout('layouts.default');
    }
}
