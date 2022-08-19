<div>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Service List</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders"
                                            class="form-control search-orders" placeholder="Search"
                                            wire:model="pengguna_search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#tambah-data-modal" >
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="tambah-data-modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="app-card-body">
                                    <form class="settings-form" wire:submit.prevent='create_pengguna'>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Name<span
                                                    class="ms-2" data-container="body"
                                                    data-trigger="hover" data-placement="top"
                                                    data-bs-toggle="tooltip" title="Service Name"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-newspaper"></i>
                                                    </span></label>
                                            <input type="text" class="form-control" id="setting-input-1"
                                                wire:model='nama_pengguna_create' required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Price<span
                                                    class="ms-2" data-container="body"
                                                    data-trigger="hover" data-placement="top"
                                                    data-bs-toggle="tooltip" title="Service Price"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-money-check-dollar"></i>
                                                    </span></label>
                                            <input type="number" class="form-control" id="setting-input-1"
                                                wire:model='service_pengguna_create' required>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn app-btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit -->
                <div wire:ignore.self class="modal fade" id="update-data-modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Set Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="app-card-body">
                                    <form class="settings-form" wire:submit.prevent='set_pengguna'>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Name
                                                <span
                                                    class="ms-2" data-container="body" data-bs-toggle="popover"
                                                    data-trigger="hover" data-placement="top"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-newspaper"></i>
                                                </span>
                                            </label>
                                            <input type="text" class="form-control" id="setting-input-1"
                                                wire:model='nama_pengguna_set' required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Price
                                                <span
                                                    class="ms-2" data-container="body" data-bs-toggle="popover"
                                                    data-trigger="hover" data-placement="top"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-money-check-dollar"></i>
                                                </span>
                                            </label>
                                            <input type="number" class="form-control" id="setting-input-1"
                                                wire:model='service_pengguna_set' required>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn app-btn-primary"
                                                data-bs-dismiss="modal">Set</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete -->
                <div wire:ignore.self class="modal fade" id="delete-data-modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="app-card-body">
                                    <form class="settings-form" wire:submit.prevent='delete_pengguna'>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Name<span
                                                    class="ms-2" data-container="body" data-bs-toggle="popover"
                                                    data-trigger="hover" data-placement="top"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-newspaper"></i>
                                                </span>
                                            </label>
                                            <input type="text" class="form-control" id="setting-input-1"
                                                    readonly
                                                    wire:model='nama_pengguna_delete' required>
                                            </div>
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Service Price
                                                <span
                                                    class="ms-2" data-container="body" data-bs-toggle="popover"
                                                    data-trigger="hover" data-placement="top"
                                                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                    <i class="fa-solid fa-money-check-dollar"></i>
                                                </span>
                                            </label>
                                            <input type="number" class="form-control"readonly id="setting-input-1"
                                                wire:model='service_pengguna_delete' required>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn app-btn-primary"
                                                data-bs-dismiss="modal">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5 mt-2">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead class="bg-primary text-center">
                                <tr class="text-center">
                                    <th class="cell text-white">No</th>
                                    <th class="cell text-white">Service Name</th>
                                    <th class="cell text-white">Service Price</th>
                                    <th class="cell text-white">Tersimpan</th>
                                    <th class="cell text-white">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr class="text-center">
                                        <td>
                                            {{ $service->id }}
                                        </td>
                                        <td>
                                            {{ $service->service_name }}
                                        </td>
                                        <td>
                                            IDR. {{ number_format($service->service_price, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $service->created_at }}
                                        </td>

                                        <td>
                                            {{-- <a data-bs-toggle="modal" data-bs-target="#delete-data-modal" wire:click="pengguna_lihat_password({{ $peng->id }})" class="btn btn-md btn-warning mb-2" href="#"><i class="fa-solid fa-eye"></i></a> --}}
                                            <a data-bs-toggle="modal" data-bs-target="#update-data-modal"
                                               data-bs-placement="top" title="Edit"
                                               wire:click="pengguna_edit({{ $service->id }})"
                                               class="btn btn-md btn-info mb-2" style="background-color:#1E90FF" href="#"><i
                                               class="fa-solid fa-pen-clip"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#delete-data-modal"
                                               data-bs-placement="top" title="Delete"
                                               style="background-color:#FF0000"
                                               wire:click="pengguna_destroy({{ $service->id }})"
                                               class="btn btn-md btn-danger mb-2" href="#"><i
                                               class="fa-solid fa-trash-arrow-up" style="color:#000000"></i>
                                            </a>
                                        </td>
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
                    {{ $services->links() }}
                </ul>
            </nav>
        </div>
    </div>


</div>
