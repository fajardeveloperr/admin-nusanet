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
                'nama_pengguna_create'=>'required|min:3|max:50',
                'email_pengguna_create' => 'required|email|unique:users,email',
                'password_pengguna_create'=>'min:6|required_with:konfirmasi_password_pengguna_create|same:konfirmasi_password_pengguna_create',
                'konfirmasi_password_pengguna_create'=>'min:6',
                'utype_pengguna_create'=>'required|string',

            ]);

            $create_pengguna = new User();
            $create_pengguna->name = $this->nama_pengguna_create;
            $create_pengguna->email = $this->email_pengguna_create;
            $create_pengguna->password = Hash::make($this->password_pengguna_create);
            $create_pengguna->utype = $this->utype_pengguna_create;
            $create_pengguna->save();

            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'success',
                'title'=> 'Pengguna berhasil tersimpan!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);

            $this->reset([
                'nama_pengguna_create',
                'email_pengguna_create',
                'password_pengguna_create',
                'konfirmasi_password_pengguna_create',
                'utype_pengguna_create',
            ]);
        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'error',
                'title'=> 'Pengguna gagal tersimpan!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);
        }
    }

    // public function pengguna_destroy()
    // {
    //     try {
    //         $this->validate([
    //             'nama_pengguna_delete'=>'required|min:3|max:50',
    //             'email_pengguna_delete' => 'required|email|unique:users,email',
    //             'password_pengguna_delete'=>'min:6|required_with:konfirmasi_password_pengguna_create|same:konfirmasi_password_pengguna_create',
    //             'konfirmasi_password_pengguna_delete'=>'min:6',
    //             'utype_pengguna_delete'=>'required|string',

    //         ]);

    //         $delete_pengguna = new User();
    //         $delete_pengguna->name = $this->nama_pengguna_delete;
    //         $delete_pengguna->email = $this->email_pengguna_delete;
    //         $delete_pengguna->password = Hash::make($this->password_pengguna_delete);
    //         $delete_pengguna->utype = $this->utype_pengguna_delete;
    //         $delete_pengguna->save();

    //         $this->dispatchBrowserEvent('swal',[
    //             'position'=> 'centered',
    //             'icon'=> 'success',
    //             'title'=> 'Pengguna Berhasil di Hapus!',
    //             'showConfirmButton'=> false,
    //             'timer'=> 1500
    //         ]);

    //         $this->reset([
    //             'nama_pengguna_create',
    //             'email_pengguna_create',
    //             'password_pengguna_create',
    //             'konfirmasi_password_pengguna_create',
    //             'utype_pengguna_create',
    //         ]);
    //     } catch (\Throwable) {
    //         $this->dispatchBrowserEvent('swal',[
    //             'position'=> 'centered',
    //             'icon'=> 'error',
    //             'title'=> 'Pengguna gagal tersimpan!',
    //             'showConfirmButton'=> false,
    //             'timer'=> 1500
    //         ]);
    //     }
    // }

    public function pengguna_destroy($id)
    {
        $pengguna = User::find($id);
        $this->nama_pengguna_delete = $pengguna->name;
        $this->email_pengguna_delete = $pengguna->email;
        $this->utype_pengguna_delete = $pengguna->utype;
        $this->password_pengguna_delete = $pengguna->password;
        $this->konfirmasi_password_pengguna_delete = $pengguna->password;
        $this->id_pengguna_destroy = $pengguna->id;

        $this->dispatchBrowserEvent('swal',[
            'position'=> 'top-right',
            'icon'=> 'success',
            'title'=> 'Pengguna berhasil terdeteksi!',
            'showConfirmButton'=> false,
            'timer'=> 1500
        ]);
    }

    public function delete_pengguna()
    {
        try {
            $this->validate([
                'nama_pengguna_delete'=>'required|string',
                'email_pengguna_delete'=>'required|string',
                'utype_pengguna_delete'=>'required|string',
                'password_pengguna_delete'=>'required|string',

            ]);

            $delete_pengguna = User::where('id',$this->id_delete_pengguna)->first();
            $delete_pengguna->delete();

            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'success',
                'title'=> 'Pengguna berhasil terhapus!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);

            $this->reset([
                'nama_pengguna_delete'
            ]);

        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'error',
                'title'=> 'Pengguna gagal terhapus!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);
        }
    }

    public function pengguna_download()
    {
        try {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'success',
                'title'=> 'Pengguna Berhasil Terdownload!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);

           return Excel::download(new ExportPengguna,'DataPengguna.xlsx');

        } catch (\Throwable) {
            $this->dispatchBrowserEvent('swal',[
                'position'=> 'centered',
                'icon'=> 'error',
                'title'=> 'Pengguna gagal terdownload!',
                'showConfirmButton'=> false,
                'timer'=> 1500
            ]);
        }
    }

    public function render()
    {

        $pengguna = User::where('name', 'like', '%'.$this->pengguna_search.'%')
        ->orwhere('email', 'like', '%'.$this->pengguna_search.'%')
        ->orwhere('name', 'like', '%'.$this->pengguna_search.'%')
        ->orwhere('utype', 'like', '%'.$this->pengguna_search.'%')
        ->paginate(10);

        return view('livewire.manager-data.pengguna-component',compact(
            'pengguna'
        ))->layout('layouts.default');
    }
}
