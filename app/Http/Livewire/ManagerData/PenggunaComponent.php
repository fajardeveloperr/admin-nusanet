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

    public $pengguna_search;

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

    // public function pengguna_destroy($id)
    // {
    //     $pengguna = User::find($id);
    //     $this->nama_pengguna_delete = $pengguna->name;
    //     $this->email_pengguna_delete = $pengguna->email;
    //     $this->utype_pengguna_delete = $pengguna->utype;
    //     $this->id = $pengguna->id;

    //     $this->dispatchBrowserEvent('swal',[
    //         'position'=> 'top-right',
    //         'icon'=> 'success',
    //         'title'=> 'Pilar berhasil terdeteksi!',
    //         'showConfirmButton'=> false,
    //         'timer'=> 1500
    //     ]);
    // }

    // public function delete_pengguna()
    // {
    //     try {
    //         $this->validate([
    //             'kode_pilar_delete'=>'required|string',
    //             'nama_pilar_delete'=>'required|string'
    //         ]);

    //         $pilar_delete = Pilar::where('id',$this->id_pilar_delete)->first();
    //         $pilar_delete->delete();

    //         $this->dispatchBrowserEvent('swal',[
    //             'position'=> 'centered',
    //             'icon'=> 'success',
    //             'title'=> 'Pilar berhasil terhapus!',
    //             'showConfirmButton'=> false,
    //             'timer'=> 1500
    //         ]);

    //         $this->reset([
    //             'nama_pilar_create'
    //         ]);

    //         $kodeOtomatis = Pilar::max('kode');
    //         $urutan = (int) substr($kodeOtomatis, 6, 6);
    //         $urutan++;
    //         $huruf = "Pilar.";
    //         $kodeGenerate = $huruf.sprintf("%06s",$urutan);
    //         $this->kode_pilar_create = $kodeGenerate;

    //     } catch (\Throwable) {
    //         $this->dispatchBrowserEvent('swal',[
    //             'position'=> 'centered',
    //             'icon'=> 'error',
    //             'title'=> 'Pilar gagal terhapus!',
    //             'showConfirmButton'=> false,
    //             'timer'=> 1500
    //         ]);
    //     }
    // }

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

        $pengguna = User::paginate(10);

        return view('livewire.manager-data.pengguna-component',compact(
            'pengguna'
        ))->layout('layouts.default');
    }
}
