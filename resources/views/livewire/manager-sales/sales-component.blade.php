<div>
    <div>
        <div>
            <div>
            </div>
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Customers Sales</h1>
                        </div>
                        <div class="col-auto">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                    <div class="col-auto">
                                        <form class="table-search-form row gx-1 align-items-center">
                                            <div class="col-auto">
                                                <input wire:model="search" type="text" id="search-orders"
                                                    name="searchorders" class="form-control search-orders"
                                                    placeholder="Search">
                                            </div>
                                        </form>
                                    </div>
                                    <!--//col-->

                                    <div class="col-auto">
                                        <a class="btn app-btn-primary" wire:click.prefetch='customer_download'>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-download me-1" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                <path fill-rule="evenodd"
                                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                                <!--//row-->
                            </div>
                            <!--//table-utilities-->
                        </div>
                        <!--//col-auto-->
                    </div>
                    <!--//row-->

                    @php
                        $class = ['Personal', 'Bussiness'];
                    @endphp

                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-white" style="width:100%;">
                            <p class="p-0 m-0 py-2 text-primary fw-bold">Informasi Data Customer</p>
                            <nav id="orders-table-tab"
                                class="orders-table-tab app-nav-tabs nav shadow flex-column flex-sm-row rounded">
                                @foreach ($class as $cls)
                                    <a class="flex-sm-fill text-sm-center nav-link {{ $cls == 'Personal' ? 'active' : null }}"
                                        id="orders-{{ $cls }}-tab" data-bs-toggle="tab"
                                        href="#orders-{{ $cls }}" role="tab"
                                        aria-controls="orders-{{ $cls }}"
                                        aria-selected="true">{{ $cls }}</a>
                                @endforeach
                            </nav>
                        </div>
                        <div class="card-body" width="100%">
                            <div class="tab-content" id="orders-table-tab-content">
                                @foreach ($class as $item)
                                    <div class="tab-pane fade show {{ $item == 'Personal' ? 'active' : null }}"
                                        id="orders-{{ $item }}" role="tablist"
                                        aria-labelledby="orders-{{ $item }}-tab">
                                        <div class="app-card app-card-orders-table">
                                            <div class="app-card-body">
                                                <table class="table table-responsive text-left pt-2"
                                                    id="datatables-{{ $item }}" style="width: 100%;">
                                                    <thead class="bg-primary">
                                                        <tr class="text-center">
                                                            <th class="cell text-white align-middle text-center">No.</th>
                                                            <th class="cell text-white align-middle text-center">ID
                                                                Pelanggan
                                                            </th>
                                                            <th class="cell text-white align-middle text-center">Nama
                                                                Lengkap</th>
                                                            <th class="cell text-white align-middle text-center">Status</th>
                                                            <th class="cell text-white align-middle text-center">Aksi
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-dark">
                                                        @php
                                                            $id = 1;
                                                        @endphp

                                                        @foreach ($customers as $custome)
                                                            @if ($custome->class == $item)
                                                                <tr style="text-align: center;">
                                                                    <td class="align-middle text-center text-secondary">
                                                                        {{ $id }}
                                                                    </td>
                                                                    <td class="align-middle text-center text-secondary">
                                                                        {{ $custome->customer_id }}</td>
                                                                    <td class="align-middle text-center text-secondary">
                                                                        {{ $custome->name }}</td>
                                                                    <td class="align-middle text-center text-secondary">
                                                                        {{ $custome->status == null ? '-' : $custome->status }}
                                                                    </td>
                                                                    <td class="align-middle text-center text-secondary">
                                                                        <a wire:click="{{ $custome->id ? null : $custome->id }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#detail-data{{ $item }}-modal{{ $id }}"
                                                                            class="btn btn-md btn-success" href="#"><i
                                                                                class="fa-solid fa-eye text-white"></i></a>
                                                                        {{-- <a data-bs-toggle="modal"
                                                                                data-bs-target="#edit-data-modal"
                                                                                class="btn btn-md btn-warning" href="#"><i
                                                                                    class="fa-solid fa-edit"></i></a> --}}
                                                                        <a href="#"
                                                                            wire:click="delete_personal(`{{ $custome->id }}`)"
                                                                            class="btn btn-md btn-danger"><i
                                                                                class="fa-solid fa-trash text-white"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal view -->
                                                                <div wire:ignore.self class="modal fade"
                                                                    id="detail-data{{ $item }}-modal{{ $id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalCenterTitle"
                                                                    aria-hidden="true">
                                                                    <div
                                                                        class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title text-success"
                                                                                    id="exampleModalLongTitle">Informasi
                                                                                    Data

                                                                                    {{ $item == 'Personal' ? 'Personal' : 'Bussiness' }}
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="pd-20 card-box height-20-p">
                                                                                    <p
                                                                                        class="h4 text-primary text-center mb-5">
                                                                                        Form Registrasi Internet
                                                                                    </p>
                                                                                    <!-- Start Template Row and Column -->
                                                                                    <div
                                                                                        class="row border rounded py-2 mx-2 mb-2">
                                                                                        <p
                                                                                            class="p-0 m-0 ps-2 fw-bold mb-3">
                                                                                            *)
                                                                                            Data
                                                                                            {{ $item == 'Personal' ? 'Personal' : 'Penanggung Jawab' }}
                                                                                        </p>
                                                                                        <div
                                                                                            class="{{ $item == 'Personal' ? 'col-sm-12' : 'col-sm-6' }}">
                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Name
                                                                                                    :</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->name }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">No.Identity</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->identity_number }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Email</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->email }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Phone
                                                                                                    Number</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->phone_number }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Address</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->address }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Reference
                                                                                                    ID</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->reference_id }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if ($item == 'Bussiness')
                                                                                            <div class="col-sm-6">
                                                                                                <div class="mb-3 row">
                                                                                                    <label
                                                                                                        for="company_name"
                                                                                                        class="col-sm-6 col-form-label">Nama
                                                                                                        Perusahaan</label>
                                                                                                    <div class="col-sm-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control-plaintext"
                                                                                                            id="company_name"
                                                                                                            value=": {{ $custome->company_name }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mb-3 row">
                                                                                                    <label
                                                                                                        for="company_address"
                                                                                                        class="col-sm-6 col-form-label">Alamat
                                                                                                        Perusahaan</label>
                                                                                                    <div class="col-sm-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control-plaintext"
                                                                                                            id="company_address"
                                                                                                            value=": {{ $custome->company_address }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mb-3 row">
                                                                                                    <label
                                                                                                        for="company_npwp"
                                                                                                        class="col-sm-6 col-form-label">No.
                                                                                                        NPWP
                                                                                                        Perusahaan</label>
                                                                                                    <div class="col-sm-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control-plaintext"
                                                                                                            id="company_npwp"
                                                                                                            value=": {{ $custome->company_npwp }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mb-3 row">
                                                                                                    <label
                                                                                                        for="company_phone_number"
                                                                                                        class="col-sm-6 col-form-label">No.
                                                                                                        Telepon
                                                                                                        Perusahaan</label>
                                                                                                    <div class="col-sm-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control-plaintext"
                                                                                                            id="company_phone_number"
                                                                                                            value=": {{ $custome->company_phone_number }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="mb-3 row">
                                                                                                    <label
                                                                                                        for="company_employees"
                                                                                                        class="col-sm-6 col-form-label">Jumlah
                                                                                                        Karyawan</label>
                                                                                                    <div class="col-sm-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            readonly
                                                                                                            class="form-control-plaintext"
                                                                                                            id="company_employees"
                                                                                                            value=": {{ $custome->company_employees }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>

                                                                                    <div
                                                                                        class="row border rounded py-2 mx-2 mb-2">
                                                                                        <p
                                                                                            class="p-0 m-0 ps-2 fw-bold mb-3">
                                                                                            *)
                                                                                            Data
                                                                                            {{ $item == 'Personal' ? 'Billing' : 'Billing' }}
                                                                                        </p>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Name
                                                                                                    :</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->name }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Phone
                                                                                                    Number</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->phone_number }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Email</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->email }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Email
                                                                                                    Alternatif 1</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": fajarofficial1511@gmail.com">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Email
                                                                                                    Alternatif 2</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": fajar@gmail.com">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6"></div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row border rounded py-2 mx-2 mb-2">
                                                                                        <p
                                                                                            class="p-0 m-0 ps-2 fw-bold mb-3">
                                                                                            *)
                                                                                            Data
                                                                                            {{ $item == 'Personal' ? 'Teknis' : 'Teknis' }}
                                                                                        </p>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Name
                                                                                                    :</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->name }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Phone
                                                                                                    Number</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->phone_number }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Email</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": {{ $custome->email }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6"></div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row border rounded py-2 mx-2 mb-2">
                                                                                        <p
                                                                                            class="p-0 m-0 ps-2 fw-bold mb-3">
                                                                                            *)
                                                                                            Data
                                                                                            {{ $item == 'Personal' ? 'Layanan' : 'Layanan' }}
                                                                                        </p>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Service
                                                                                                    :</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value="">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Photo
                                                                                                    KTP Identity</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": ">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Photo
                                                                                                    Selfie Identity</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <img src=""
                                                                                                        readonly
                                                                                                        class="form-control-plaintext"
                                                                                                        id="staticEmail"
                                                                                                        value=": ">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6"></div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row border rounded py-2 mx-2 mb-2">
                                                                                        <p
                                                                                            class="p-0 m-0 ps-2 fw-bold mb-3">
                                                                                            *)
                                                                                            Data
                                                                                            {{ $item == 'Personal' ? 'Status' : 'Status' }}
                                                                                        </p>
                                                                                        <div class="col-sm-6">
                                                                                            <div class="mb-3 row">
                                                                                                <label for="staticEmail"
                                                                                                    class="col-sm-6 col-form-label">Status
                                                                                                    :</label>
                                                                                                <div class="col-sm-6">
                                                                                                    <select name="utype"
                                                                                                        id="utype"
                                                                                                        class="form-control form-control-sm">
                                                                                                        <option
                                                                                                            value="#">
                                                                                                            Pilih Status :
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="#">
                                                                                                            Approved
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="#">
                                                                                                            Rejected
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6"></div>
                                                                                    </div>
                                                                                    <!-- End Template Row and Column -->
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="modal-footer d-flex justify-content-end">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-lg rounded text-center">Confirm</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @php
                                                                    $id++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--//tab-pane-->

                                {{-- <nav class="app-pagination">
                                    <ul class="pagination justify-content-center">
                                        {{ $customers->links() }}
                                    </ul>
                                </nav> --}}

                            </div>
                            <!--//tab-content-->


                        </div>
                    </div>
                </div>
                <!--//container-fluid-->
            </div>
            <!--//app-content-->
        </div>

    </div>

</div>