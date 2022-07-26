<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Pengguna</h1>
            </div>
            <div class="col-auto">
                    <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form class="table-search-form row gx-1 align-items-center">
                                <div class="col-auto">
                                    <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search" wire:model="pengguna_search">
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-primary" wire:click.prefetch='pengguna_download'>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-data-modal">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="tambah-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="app-card-body">
                            <form class="settings-form" wire:submit.prevent='create_pengguna'>
                                @csrf
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Nama<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="text" class="form-control" id="setting-input-1" wire:model='nama_pengguna_create' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Email<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="email" class="form-control" id="setting-input-1" wire:model='email_pengguna_create' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='password_pengguna_create' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Konfirmasi Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='konfirmasi_password_pengguna_create' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Daftar Sebagai</label>
                                    <select class="form-control" id="setting-input-2" wire:model='utype_pengguna_create'>
                                        <option value="">-------Pilih Jabatan-------</option>
                                        <option value="AuthMaster">Superadmin</option>
                                        <option value="AuthSales">Sales</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal Edit -->
            <div wire:ignore.self class="modal fade" id="update-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Set Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="app-card-body">
                            <form class="settings-form" wire:submit.prevent='set_pengguna'>
                                @csrf
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Nama<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="text" class="form-control" id="setting-input-1" wire:model='nama_pengguna_set' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Email<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="email" class="form-control" id="setting-input-1" wire:model='email_pengguna_set' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='password_pengguna_set' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Konfirmasi Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='konfirmasi_password_pengguna_set' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Daftar Sebagai</label>
                                    <select class="form-control" id="setting-input-2" wire:model='utype_pengguna_set'>
                                        <option value="">-------Pilih Jabatan-------</option>
                                        <option value="AuthMaster">Superadmin</option>
                                        <option value="AuthSales">Sales</option>

                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Set</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal Delete -->
            <div wire:ignore.self class="modal fade" id="delete-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="app-card-body">
                            <form class="settings-form" wire:submit.prevent='delete_pengguna'>
                                @csrf
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Nama<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="text" class="form-control" id="setting-input-1" wire:model='nama_pengguna_delete' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Email<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="email" class="form-control" id="setting-input-1" wire:model='email_pengguna_delete' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='password_pengguna_delete' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Konfirmasi Password<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                    <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="password" class="form-control" id="setting-input-1" wire:model='konfirmasi_password_pengguna_delete' required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Daftar Sebagai</label>
                                    <select class="form-control" id="setting-input-2" wire:model='utype_pengguna_delete'>
                                        <option value="">-------Pilih Jabatan-------</option>
                                        <option value="AuthMaster">Superadmin</option>
                                        <option value="AuthSales">Sales</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr class="text-center">
                                <th class="cell">No.</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Email</th>
                                <th class="cell">Jabatan</th>
                                <th class="cell">Tersimpan</th>
                                {{-- <th class="cell">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengguna as $peng)
                                <tr class="text-center">
                                    <td>
                                        {{ $peng->id }}
                                    </td>
                                    <td>
                                        {{ $peng->name }}
                                    </td>
                                    <td>
                                        {{ $peng->email }}
                                    </td>
                                    <td>
                                        {{ $peng->utype }}
                                    </td>
                                    <td>
                                        {{ $peng->created_at }}
                                    </td>

                                    {{-- <td>
                                        <a data-bs-toggle="modal" data-bs-target="#delete-data-modal" wire:click="pengguna_lihat_password({{ $peng->id }})" class="btn btn-md btn-warning" href="#"><i class="fa-solid fa-eye"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#update-data-modal" wire:click="pengguna_edit({{ $peng->id }})" class="btn btn-md btn-info" href="#"><i class="fa-solid fa-pen-clip"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete-data-modal" wire:click="pengguna_destroy({{ $peng->id }})" class="btn btn-md btn-danger" href="#"><i class="fa-solid fa-trash-arrow-up"></i></a>
                                    </td> --}}
                                </tr>
                            @empty
                                <td>
                                    <i>Maaf data belum tersedia!</i>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                {{ $pengguna->links() }}
            </ul>
        </nav>
    </div>
</div>

