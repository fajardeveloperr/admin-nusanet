<div>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0 text-primary">
                        <i class="fa-solid fa-ticket me-1"></i>
                        Data Promo
                    </h1>
                </div>
            </div>
            <!--//row-->
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary" style="width:100%;">
                    <p class="p-0 m-0 py-2 text-white fw-bold">
                        <i class="fas fa-info-circle me-1"></i>
                        Informasi Data Promo
                    </p>
                    <button type="button" class="btn btn-light text-primary shadow" data-bs-toggle="modal"
                        data-bs-target="#addPromoModal">
                        <i class="fas fa-plus-circle me-1"></i>
                        Tambah Promo
                    </button>

                    <!-- Modal Tambah Data Promo -->
                    <div wire:ignore.self class="modal fade" id="addPromoModal" tabindex="-1"
                        aria-labelledby="addPromoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white" id="addPromoModalLabel">
                                        <i class="fas fa-plus-circle me-1"></i>
                                        Tambah Data Promo
                                    </h5>
                                    <style>
                                        .btn-close {
                                            box-sizing: content-box;
                                            width: 1em;
                                            height: 1em;
                                            padding: .25em .25em;
                                            color: #fff;
                                            background: rgba(0, 0, 0, 0) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
                                            border: 0;
                                            border-radius: .375rem;
                                            opacity: .5;
                                        }
                                    </style>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="settings-form" wire:submit.prevent='create_promo'>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kode_promo_admin" class="form-label text-primary fw-bold">
                                                Kode Promo
                                            </label>
                                            <input type="text"
                                                class="form-control text-primary border-primary @error('setkode_promo_admin') is-invalid border-danger @enderror"
                                                id="kode_promo_admin" wire:model.defer="setkode_promo_admin"
                                                placeholder="Masukkan Kode Promo...">
                                            @error('setkode_promo_admin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="package_name_admin" class="form-label text-primary fw-bold">
                                                Nama Paket
                                            </label>
                                            <select
                                                class="form-select text-primary border-primary @error('package_name_admin') is-invalid border-danger @enderror"
                                                id="package_name_admin" wire:model='package_name_admin'>
                                                <option value="">
                                                    Pilih Nama Paket...
                                                </option>
                                                @foreach ($dataServiceList as $key => $value)
                                                    <option value="{{ $key }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                            @error('package_name_admin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="package_top_admin" class="form-label text-primary fw-bold">
                                                TermOfPayment Paket
                                            </label>
                                            @php
                                                $topPaket = ['Bulanan', 'Tahunan'];
                                            @endphp
                                            <select
                                                class="form-select text-primary border-primary @error('package_top_admin') is-invalid border-danger @enderror"
                                                id="package_top_admin" wire:model='package_top_admin'>
                                                <option value="">
                                                    Pilih TOP Paket...
                                                </option>
                                                @foreach ($topPaket as $top)
                                                    <option value="{{ $top }}">{{ $top }}</option>
                                                @endforeach
                                            </select>
                                            @error('package_top_admin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="monthly_discount_admin" class="form-label text-primary fw-bold">
                                                Potongan Bulan
                                            </label>
                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control text-primary border-primary @error('monthly_discount_admin') is-invalid border-danger @enderror"
                                                    id="monthly_discount_admin"
                                                    wire:model.defer="monthly_discount_admin"
                                                    placeholder="Masukkan Potongan Bulan..."
                                                    aria-label="Masukkan Potongan Bulan..."
                                                    aria-describedby="monthly_discount_admin_addons">
                                                <span class="input-group-text bg-primary text-white"
                                                    id="monthly_discount_admin_addons">Bulan</span>
                                                @error('monthly_discount_admin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="discount_admin" class="form-label text-primary fw-bold">
                                                Potongan Diskon
                                            </label>
                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control text-primary border-primary @error('discount_admin') is-invalid border-danger @enderror"
                                                    id="discount_admin" wire:model.defer="discount_admin"
                                                    placeholder="Masukkan Potongan Persentase Diskon..."
                                                    aria-label="Masukkan Potongan Persentase Diskon..."
                                                    aria-describedby="discount_admin_addons">
                                                <span class="input-group-text bg-primary text-white"
                                                    id="discount_admin_addons">%</span>
                                                @error('discount_admin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="start_promo_period_datetime"
                                                class="form-label text-primary fw-bold">
                                                Periode Awal Masa Promo
                                            </label>
                                            <input type="datetime-local"
                                                class="form-control text-primary border-primary @error('start_promo_period_datetime') is-invalid border-danger @enderror"
                                                id="start_promo_period_datetime"
                                                wire:model.defer="start_promo_period_datetime">
                                            @error('start_promo_period_datetime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="end_promo_period_datetime"
                                                class="form-label text-primary fw-bold">
                                                Periode Akhir Masa Promo
                                            </label>
                                            <input type="datetime-local"
                                                class="form-control text-primary border-primary @error('end_promo_period_datetime') is-invalid border-danger @enderror"
                                                id="end_promo_period_datetime"
                                                wire:model.defer="end_promo_period_datetime">
                                            @error('end_promo_period_datetime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="reset" class="btn btn-light text-danger"
                                            data-bs-dismiss="modal">
                                            <i class="fa-solid fa-ban me-1"></i>
                                            Batalkan Perubahan
                                        </button>
                                        <button type="submit" class="btn btn-light">
                                            <i class="fa-solid fa-floppy-disk me-1"></i>
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="cell text-white align-middle text-center">No.</th>
                                    <th class="cell text-white align-middle text-center">Kode Promo</th>
                                    <th class="cell text-white align-middle text-center">Nama Paket</th>
                                    <th class="cell text-white align-middle text-center">TOP Paket</th>
                                    <th class="cell text-white align-middle text-center">Potongan Bulan</th>
                                    <th class="cell text-white align-middle text-center">Potongan Diskon</th>
                                    <th class="cell text-white align-middle text-center">Periode Masa Awal Promo</th>
                                    <th class="cell text-white align-middle text-center">Periode Masa Akhir Promo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dataPromo as $promo)
                                    <tr>
                                        <td class="cell text-primary align-middle text-center">{{ $i }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center fw-bold">
                                            {{ $promo->promo_code }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->package_name }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->package_top }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->monthly_cut }} Bulan
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->discount_cut }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->activate_date }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            {{ $promo->expired_date }}
                                        </td>
                                        <td class="cell text-primary align-middle text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                wire:click="promo_edit({{ $promo->id }})"
                                                data-bs-target="#updateDataPromoModal-{{ $i }}">
                                                <i class="fas fa-edit text-white"></i>
                                            </button>

                                            <!-- Modal Update Data Promo -->
                                            <div wire:ignore.self class="modal fade"
                                                id="updateDataPromoModal-{{ $i }}" tabindex="-1"
                                                aria-labelledby="updateDataPromoModalLabel-{{ $i }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-white"
                                                                id="updateDataPromoModalLabel-{{ $i }}">
                                                                <i class="fas fa-edit me-1"></i>
                                                                Update Data Promo
                                                            </h5>
                                                            <style>
                                                                .btn-close {
                                                                    box-sizing: content-box;
                                                                    width: 1em;
                                                                    height: 1em;
                                                                    padding: .25em .25em;
                                                                    color: #fff;
                                                                    background: rgba(0, 0, 0, 0) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
                                                                    border: 0;
                                                                    border-radius: .375rem;
                                                                    opacity: .5;
                                                                }
                                                            </style>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="settings-form" wire:submit.prevent='set_promo'>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <div for="kode_promo_admin"
                                                                        class="form-label text-primary fw-bold"
                                                                        style="text-align: start;">
                                                                        Kode Promo
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control text-primary border-primary @error('kode_promo_admin') is-invalid border-danger @enderror"
                                                                        id="kode_promo_admin_{{ $i }}"
                                                                        wire:model.defer="setkode_promo_admin"
                                                                        placeholder="Masukkan Kode Promo...">
                                                                    @error('kode_promo_admin')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div for="package_name_admin"
                                                                        class="form-label text-primary fw-bold"
                                                                        style="text-align: start;">
                                                                        Nama Paket
                                                                    </div>
                                                                    <select
                                                                        class="form-select text-primary border-primary @error('package_name_admin') is-invalid border-danger @enderror"
                                                                        id="package_name_admin"
                                                                        wire:model='package_name_admin'>
                                                                        <option value="">
                                                                            Pilih Nama Paket...
                                                                        </option>
                                                                        @foreach ($dataServiceList as $key => $value)
                                                                            <option value="{{ $key }}">
                                                                                {{ $key }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('package_name_admin')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div for="package_top_admin"
                                                                        class="form-label text-primary fw-bold"
                                                                        style="text-align: start;">
                                                                        TermOfPayment Paket
                                                                    </div>
                                                                    @php
                                                                        $topPaket = ['Bulanan', 'Tahunan'];
                                                                    @endphp
                                                                    <select
                                                                        class="form-select text-primary border-primary @error('package_top_admin') is-invalid border-danger @enderror"
                                                                        id="package_top_admin"
                                                                        wire:model='package_top_admin'>
                                                                        <option value="">
                                                                            Pilih TOP Paket...
                                                                        </option>
                                                                        @foreach ($topPaket as $top)
                                                                            <option value="{{ $top }}">
                                                                                {{ $top }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('package_top_admin')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div style="text-align: start;"
                                                                        for="monthly_discount_admin"
                                                                        class="form-label text-primary fw-bold">
                                                                        Potongan Bulan
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <input type="number"
                                                                            class="form-control text-primary border-primary"
                                                                            id="monthly_discount_admin"
                                                                            wire:model.defer="setmonthly_discount_admin"
                                                                            placeholder="Masukkan Potongan Bulan..."
                                                                            aria-label="Masukkan Potongan Bulan..."
                                                                            aria-describedby="monthly_discount_admin_addons">
                                                                        <span
                                                                            class="input-group-text bg-primary text-white"
                                                                            id="monthly_discount_admin_addons">Bulan</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div style="text-align: start;"
                                                                        for="discount_admin"
                                                                        class="form-label text-primary fw-bold">
                                                                        Potongan Diskon
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <input type="number"
                                                                            class="form-control text-primary border-primary"
                                                                            id="discount_admin"
                                                                            wire:model.defer="setdiscount_admin"
                                                                            placeholder="Masukkan Potongan Persentase Diskon..."
                                                                            aria-label="Masukkan Potongan Persentase Diskon..."
                                                                            aria-describedby="discount_admin_addons">
                                                                        <span
                                                                            class="input-group-text bg-primary text-white"
                                                                            id="discount_admin_addons">%</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div style="text-align: start;"
                                                                        for="start_promo_period_datetime"
                                                                        class="form-label text-primary fw-bold">
                                                                        Periode Awal Masa Promo
                                                                    </div>
                                                                    <input type="datetime-local"
                                                                        class="form-control text-primary border-primary"
                                                                        id="start_promo_period_datetime"
                                                                        wire:model.defer="setstart_promo_period_datetime">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div style="text-align: start;"
                                                                        for="end_promo_period_datetime"
                                                                        class="form-label text-primary fw-bold">
                                                                        Periode Akhir Masa Promo
                                                                    </div>
                                                                    <input type="datetime-local"
                                                                        class="form-control text-primary border-primary"
                                                                        id="end_promo_period_datetime"
                                                                        wire:model.defer="setend_promo_period_datetime">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer bg-white">
                                                                <button type="reset"
                                                                    class="btn btn-light text-danger"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-ban me-1"></i>
                                                                    Batalkan Perubahan
                                                                </button>
                                                                <button type="submit" class="btn btn-light">
                                                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                                                    Simpan Perubahan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-danger"
                                                wire:click="hapusDataPromo({{ $promo->id }})">
                                                <i class="fas fa-trash-alt text-white"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.data-table')

<script>
    var dataTable = $('#dataTable').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });

    $(document).ready(() => {
        dataTable.destroy();
        var dataTable = $('#dataTable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });

    window.addEventListener('refreshListener', event => {
        dataTable.destroy();
        var dataTable = $('#dataTable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    })

    window.addEventListener('swal', event => {
        setTimeout(() => {
            window.location.reload();
        }, 1500);
    })
</script>
