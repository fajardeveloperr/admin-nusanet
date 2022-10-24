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

    public $id_pegawai_create,
        $nama_pengguna_create,
        $email_pengguna_create,
        $password_pengguna_create,
        $konfirmasi_password_pengguna_create,
        $utype_pengguna_create;

    public $id_pegawai_set,
        $nama_pengguna_set,
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

    public $password_pengguna_reset,
        $konfirmasi_password_pengguna_reset,
        $id_pengguna_reset;

    public function approved_status($id)
    {
        $userSearch = User::find($id);
        $userSearch->isApprovedByAdmin = true;
        $userSearch->save();
    }

    // Create User//
    public function create_pengguna()
    {
        $this->validate([
            'id_pegawai_create' => 'required|unique:users,employee_id',
            'nama_pengguna_create' => 'required|unique:users,name',
            'email_pengguna_create' => 'required|email|unique:users,email',
            'password_pengguna_create' => 'min:6|required_with:konfirmasi_password_pengguna_create|same:konfirmasi_password_pengguna_create',
            'konfirmasi_password_pengguna_create' => 'min:6',
            'utype_pengguna_create' => 'required|string',
        ]);

        try {
            $create_pengguna = new User();
            $create_pengguna->employee_id = $this->id_pegawai_create;
            $create_pengguna->name = $this->nama_pengguna_create;
            $create_pengguna->email = $this->email_pengguna_create;
            $create_pengguna->password = Hash::make($this->password_pengguna_create);
            $create_pengguna->utype = $this->utype_pengguna_create;
            $create_pengguna->isApprovedByAdmin = true;
            $create_pengguna->save();

            //sweatalert//
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
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => $th->getMessage(),
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    //Edit User//
    public function pengguna_edit($id)
    {
        $pengguna_edit = User::find($id);
        $this->id_pegawai_set = $pengguna_edit->employee_id;
        $this->nama_pengguna_set = $pengguna_edit->name;
        $this->email_pengguna_set = $pengguna_edit->email;
        $this->password_pengguna_set = $pengguna_edit->password;
        $this->password_pengguna_set = $pengguna_edit->password;
        $this->konfirmasi_password_pengguna_set = $pengguna_edit->password;
        $this->utype_pengguna_set = $pengguna_edit->utype;
        $this->id_pengguna_set = $pengguna_edit->id;
    }

    public function set_pengguna()
    {
        try {
            $this->validate([
                'id_pegawai_set' => 'required|string',
                'nama_pengguna_set' => 'required|string',
                'email_pengguna_set' => 'required|string',
                'utype_pengguna_set' => 'required|string',
                'konfirmasi_password_pengguna_set' => 'required|string'

            ]);

            $set_pengguna = User::where('id', $this->id_pengguna_set)->first();
            $set_pengguna->employee_id = $this->id_pegawai_set;
            $set_pengguna->name = $this->nama_pengguna_set;
            $set_pengguna->email = $this->email_pengguna_set;
            $set_pengguna->password = $this->password_pengguna_set;
            $set_pengguna->utype = $this->utype_pengguna_set;
            $set_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Edit Pengguna berhasil tersimpan!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => $th->getMessage(),
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    //reset password//

    public function pengguna_reset_password($id)
    {
        $pengguna_reset_password = User::find($id);
        $this->id_pengguna_reset = $pengguna_reset_password->id;
    }

    public function reset_password_pengguna()
    {
        try {
            $this->validate([
                'password_pengguna_reset' => 'min:6|required_with:konfirmasi_password_pengguna_reset|same:konfirmasi_password_pengguna_reset',
                'konfirmasi_password_pengguna_reset' => 'min:6',
            ]);

            $reset_password_pengguna = User::where('id', $this->id_pengguna_reset)->first();
            $reset_password_pengguna->password = Hash::make($this->password_pengguna_reset);
            $reset_password_pengguna->save();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Password berhasil tereset!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'error',
                'title' => 'Password gagal tereset!',
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
        }
    }

    //Delete User//
    public function pengguna_destroy($id)
    {
        $pengguna_destroy = User::find($id);
        $this->nama_pengguna_delete = $pengguna_destroy->name;
        $this->email_pengguna_delete = $pengguna_destroy->email;
        $this->password_pengguna_delete = $pengguna_destroy->password;
        $this->konfirmasi_password_pengguna_delete = $pengguna_destroy->password;
        $this->utype_pengguna_delete = $pengguna_destroy->utype;
        $this->id_pengguna_delete = $pengguna_destroy->id;
    }

    public function delete_pengguna()
    {
        try {
            $delete_pengguna = User::where('id', $this->id_pengguna_delete)->first();
            $delete_pengguna->delete();

            $this->dispatchBrowserEvent('swal', [
                'position' => 'centered',
                'icon' => 'success',
                'title' => 'Delete Pengguna berhasil terhapus!',
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
                'title' => 'Delete Pengguna gagal terhapus!',
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
