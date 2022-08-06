<div>
    <div>
        <div>
        </div>
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Customers</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        {{-- <div class="col-auto">
                                            <input wire:model="search" type="text" id="search-orders"
                                                name="searchorders" class="form-control search-orders"
                                                placeholder="Search ....">
                                        </div> --}}
                                    </form>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <select class="form-select w-auto">
                                        <option selected value="option-1">All Status</option>
                                        <option value="option-2">Approved</option>
                                        <option value="option-3">Rejected</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <input wire:model="date_picker" type="date" class="form-control text-center "
                                        name="start_date" width="100%">

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
                    </div <div class="card-body">
                    <div class="tab-content p-3" id="orders-table-tab-content">
                        @foreach ($class as $item)
                            <div class="tab-pane fade show {{ $item == 'Personal' ? 'active' : null }}"
                                id="orders-{{ $item }}" role="tablist"
                                aria-labelledby="orders-{{ $item }}-tab">
                                <div class="app-card app-card-orders-table">
                                    <div class="app-card-body table-responsive">
                                        <table class="table text-left pt-2 table-bordered table-striped"
                                            id="datatables-{{ $item }}" style="width: 100%;">
                                            <colgroup>
                                                <col style="width: 5%;">
                                                <col style="width: 13%;">
                                                <col style="width: 13%;">
                                                <col style="width: 28%;">
                                                <col style="width: 13%;">
                                                <col style="width: 13%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="bg-primary bg-gradient">
                                                <tr class="text-center">
                                                    <th class="cell text-white align-middle text-center">No.</th>
                                                    <th class="cell text-white align-middle text-center">Name</th>
                                                    <th class="cell text-white align-middle text-center">Email</th>
                                                    <th class="cell text-white align-middle text-center">Address</th>
                                                    <th class="cell text-white align-middle text-center">Created_At</th>
                                                    <th class="cell text-white align-middle text-center">Status</th>
                                                    <th class="cell text-white align-middle text-center">Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-light bg-gradient">
                                                @php
                                                    $id = 1;
                                                @endphp
                                                @foreach ($customers as $custome)
                                                    @if ($custome->class == $item)
                                                        <tr class="text-black" style="text-align: center;">
                                                            <td class="align-middle text-center text-secondary">
                                                                {{ $id }}
                                                            </td>
                                                            <td class="align-middle text-center text-secondary">
                                                                {{ $custome->name }}
                                                            </td>
                                                            <td class="align-middle text-center text-secondary">
                                                                {{ $custome->email }}
                                                            </td>
                                                            <td class="align-middle text-secondary">
                                                                <p style="text-align: justify;">{{ $custome->address }}
                                                                </p>
                                                            </td>
                                                            <td class="align-middle text-center text-secondary">
                                                                {{ $custome->created_at }}
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if ($custome->approval->isApproved)
                                                                    <span class="badge bg-success text-white">
                                                                        Approved
                                                                    </span>
                                                                @elseif ($custome->approval->isRejected)
                                                                    <span class="badge bg-danger text-white">
                                                                        Rejected
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-secondary text-white">
                                                                        -
                                                                    </span>
                                                                @endif

                                                            </td>
                                                            <td class="align-middle text-center text-secondary">
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <button type="button"
                                                                        wire:click="{{ $custome->id ? null : $custome->id }}"
                                                                        class="btn btn-md btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#detail-data{{ $item }}-modal{{ $id }}">
                                                                        <i class="fa-solid fa-eye text-white"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        wire:click="approved_status(`{{ $custome->id }}`)"
                                                                        class="btn btn-md btn-success text-white">
                                                                        <i class="fa-solid fa-circle-check"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        wire:click="rejected_status(`{{ $custome->id }}`)"
                                                                        class="btn btn-md btn-danger text-white">
                                                                        <i class="fa-solid fa-ban"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal view -->
                                                        <div wire:ignore.self class="modal fade"
                                                            id="detail-data{{ $item }}-modal{{ $id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                                                                    <div class="modal-body p-3">
                                                                        <div
                                                                            class="border rounded p-3 bg-secondary bg-gradient mb-3">
                                                                            <p
                                                                                class="fw-bold h5 text-white text-gradient mb-3">
                                                                                *) Data
                                                                                {{ $item == 'Personal' ? 'Personal' : 'Penanggung Jawab' }}
                                                                            </p>
                                                                            <div
                                                                                class="row bordered bg-light bg-gradient rounded mx-1 p-3 mb-3">
                                                                                <div
                                                                                    class="{{ $item == 'Personal' ? 'col-sm-12' : 'col-sm-6' }}">
                                                                                    <div class="mb-3">
                                                                                        <label for="customer_id"
                                                                                            class="form-label text-secondary">No.
                                                                                            ID Pelanggan</label>
                                                                                        <input type="text" readonly
                                                                                            class="form-control text-secondary"
                                                                                            id="customer_id"
                                                                                            value="{{ $custome->customer_id }}">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="customer_name"
                                                                                            class="form-label text-secondary">Nama
                                                                                            Lengkap</label>
                                                                                        <input type="text" readonly
                                                                                            class="form-control text-secondary"
                                                                                            id="customer_name"
                                                                                            value="{{ $custome->name }}">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="address"
                                                                                            class="form-label text-secondary">Alamat
                                                                                            Lengkap</label>
                                                                                        <textarea class="form-control text-secondary" name="address" id="address" rows="3"
                                                                                            style="text-align: justify; height:100%;" readonly>{{ $custome->address }}</textarea>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="email_address"
                                                                                            class="form-label text-secondary">Email</label>
                                                                                        <input type="email" readonly
                                                                                            class="form-control text-secondary"
                                                                                            id="email_address"
                                                                                            value="{{ $custome->email }}">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="identity_number"
                                                                                            class="form-label text-secondary">No.
                                                                                            Identitas</label>
                                                                                        <input type="text" readonly
                                                                                            class="form-control text-secondary"
                                                                                            id="identity_number"
                                                                                            value="{{ $custome->identity_number }}">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="phone_number"
                                                                                            class="form-label text-secondary">No.
                                                                                            HP/WA yang aktif</label>
                                                                                        <input type="text" readonly
                                                                                            class="form-control text-secondary"
                                                                                            id="phone_number"
                                                                                            value="{{ $custome->phone_number }}">
                                                                                    </div>
                                                                                </div>
                                                                                @if ($item == 'Bussiness')
                                                                                    <div class="col-sm-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="company_name"
                                                                                                class="form-label text-secondary">Nama
                                                                                                Perusahaan</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="company_name"
                                                                                                value="{{ $custome->company_name }}">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="company_address"
                                                                                                class="form-label text-secondary">Alamat
                                                                                                Perusahaan</label>
                                                                                            <textarea class="form-control text-secondary" id="company_address" rows="3"
                                                                                                style="height: 100%; text-align: justify;" readonly>{{ $custome->company_address }}</textarea>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label for="company_npwp"
                                                                                                class="form-label text-secondary">No.
                                                                                                NPWP
                                                                                                Perusahaan</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="company_npwp"
                                                                                                value="{{ $custome->company_npwp }}">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="company_phone_number"
                                                                                                class="form-label text-secondary">No.
                                                                                                Telepon
                                                                                                Perusahaan</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="company_phone_number"
                                                                                                value="{{ $custome->company_phone_number }}">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="company_employees"
                                                                                                class="form-label text-secondary">Jumlah
                                                                                                Karyawan
                                                                                                Perusahaan</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="company_employees"
                                                                                                value="{{ $custome->company_employees }}">
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="border rounded p-3 bg-secondary bg-gradient mb-3">
                                                                            <p
                                                                                class="fw-bold h5 text-white text-gradient mb-3">
                                                                                *) Data Billing
                                                                            </p>
                                                                            <div
                                                                                class="row bordered bg-light bg-gradient rounded mx-1 p-3 mb-3">
                                                                                <div class="mb-3">
                                                                                    <label for="billing_name"
                                                                                        class="form-label text-secondary">Nama
                                                                                        Billing</label>
                                                                                    <input type="text" readonly
                                                                                        class="form-control text-secondary"
                                                                                        id="billing_name"
                                                                                        value="{{ $custome->billing->billing_name }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="billing_contact"
                                                                                        class="form-label text-secondary">Kontak
                                                                                        Billing</label>
                                                                                    <input type="text" readonly
                                                                                        class="form-control text-secondary"
                                                                                        id="billing_contact"
                                                                                        value="{{ $custome->billing->billing_contact }}">
                                                                                </div>
                                                                                @php
                                                                                    $bil = 1;
                                                                                @endphp
                                                                                @foreach (json_decode($custome->billing->billing_email) as $billingEmail)
                                                                                    @if ($bil == 1)
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="billing_email_{{ $bil }}"
                                                                                                class="form-label text-secondary">Email
                                                                                                Billing</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="billing_email_{{ $bil }}"
                                                                                                value="{{ $billingEmail }}">
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="alternate_billing_email_{{ $bil }}"
                                                                                                class="form-label text-secondary">Alternatif
                                                                                                Email
                                                                                                Billing
                                                                                                {{ $bil - 1 }}</label>
                                                                                            <input type="text"
                                                                                                readonly
                                                                                                class="form-control text-secondary"
                                                                                                id="alternate_billing_email_{{ $bil }}"
                                                                                                value="{{ $billingEmail }}">
                                                                                        </div>
                                                                                    @endif
                                                                                    @php
                                                                                        $bil++;
                                                                                    @endphp
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="border rounded p-3 bg-secondary bg-gradient mb-3">
                                                                            <p
                                                                                class="fw-bold h5 text-white text-gradient mb-3">
                                                                                *) Data Technical
                                                                            </p>
                                                                            <div
                                                                                class="row bordered bg-light bg-gradient rounded mx-1 p-3 mb-3">
                                                                                <div class="mb-3">
                                                                                    <label for="billing_name"
                                                                                        class="form-label text-secondary">Nama
                                                                                        Teknikal</label>
                                                                                    <input type="text" readonly
                                                                                        class="form-control text-secondary"
                                                                                        id="billing_name"
                                                                                        value="{{ $custome->technical->technical_name }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="billing_contact"
                                                                                        class="form-label text-secondary">Kontak
                                                                                        Teknikal</label>
                                                                                    <input type="text" readonly
                                                                                        class="form-control text-secondary"
                                                                                        id="billing_contact"
                                                                                        value="{{ $custome->technical->technical_contact }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="billing_email"
                                                                                        class="form-label text-secondary">Email
                                                                                        Teknikal</label>
                                                                                    <input type="text" readonly
                                                                                        class="form-control text-secondary"
                                                                                        id="billing_email"
                                                                                        value="{{ $custome->technical->technical_email }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="border rounded p-3 bg-secondary bg-gradient mb-3">
                                                                            <p
                                                                                class="fw-bold h5 text-white text-gradient mb-3">
                                                                                *) Data Service
                                                                            </p>
                                                                            <div
                                                                                class="row bordered bg-light bg-gradient rounded mx-1 p-3 mb-3">
                                                                                @php
                                                                                    $servicePackage = json_decode($custome->service->service_package);
                                                                                @endphp
                                                                                <ol>
                                                                                    @for ($i = 0; $i < count($servicePackage); $i++)
                                                                                        <li>
                                                                                            @foreach ($servicePackage[$i] as $key => $value)
                                                                                                @if ($key == 'service_name')
                                                                                                    <p class="fw-bold">
                                                                                                        Nama Layanan :
                                                                                                        <span
                                                                                                            class="fw-normal">{{ $value }}</span>
                                                                                                    </p>
                                                                                                @elseif($key == 'service_price')
                                                                                                    <p class="fw-bold">
                                                                                                        Harga Layanan :
                                                                                                        <span
                                                                                                            class="fw-normal">{{ $value }}</span>
                                                                                                    </p>
                                                                                                @elseif($key == 'termofpaymentDeals')
                                                                                                    <p class="fw-bold">
                                                                                                        Jangka Waktu
                                                                                                        Pembayaran :
                                                                                                        <span
                                                                                                            class="fw-normal">{{ $value }}</span>
                                                                                                    </p>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </li>
                                                                                    @endfor
                                                                                </ol>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="border rounded p-3 bg-secondary bg-gradient mb-3">
                                                                            <p
                                                                                class="fw-bold h5 text-white text-gradient mb-3">
                                                                                *) Data Approval
                                                                            </p>
                                                                            <div
                                                                                class="row bordered bg-light bg-gradient rounded mx-1 p-3 mb-3">
                                                                                @if ($custome->approval->isApproved)
                                                                                    <span
                                                                                        class="badge text-bg-success text-white fs-5">Data
                                                                                        Telah Disetujui</span>
                                                                                @elseif($custome->approval->isRejected)
                                                                                    <span
                                                                                        class="badge text-bg-danger text-white fs-5">Data
                                                                                        Belum Disetujui</span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge text-bg-info text-white fs-5">Menunggu
                                                                                        Persetujuan</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
@include('includes.data-table')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>
<script>
    window.addEventListener('swal', event => {
        setTimeout(() => location.reload(), 1500);
    })
</script>
