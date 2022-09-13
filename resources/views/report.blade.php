<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Open Sans Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    {{-- Bootstrap 5.2 CSS --}}
    <link rel="stylesheet" href="{{ URL::to('plugin/bootstrap5.2.1/css/bootstrap.min.css') }}">

    <title>Form Internet Registration PDF</title>

    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 m-0">
        <nav class="navbar bg-white mb-4" style="border-bottom: 2px solid #808080;">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ URL::to('assets/images/bg-nusanet.png') }}" alt="Bootstrap" width="120">
                </div>
                <div class="d-flex">
                    <p class="h4 p-0 m-0 fw-bold me-2">Lampiran Form Internet Registrasi</p>
                </div>
            </div>
        </nav>

        <div class="container">
            <h3 class="text-center fw-bold mb-4">Form Internet Registrasi Online</h3>
            <div class="row p-1" style="border: 1px solid #808080; border-radius: 10px; margin-bottom:6em;">
                <p class="fw-bold"><span class="text-danger">*)</span> Data Personal / Data Penanggungjawab</p>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $customer->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <textarea type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="5" readonly>{{ json_decode($customer->address)[0] }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email_address" name="email_address"
                            value="{{ $customer->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="identity_number" class="form-label">No. Identitas KTP</label>
                        <input type="text" class="form-control" id="identity_number" name="identity_number"
                            value="{{ $customer->identity_number }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $customer->phone_number }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            value="{{ $customer->company_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="company_address" class="form-label">Alamat Perusahaan</label>
                        <textarea type="text" class="form-control" id="company_address" name="company_address"
                            value="{{ $customer->company_address }}" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="company_npwp" class="form-label">No. NPWP Perusahaan</label>
                        <input type="text" class="form-control" id="company_npwp" name="company_npwp"
                            value="{{ $customer->company_npwp }}"readonly>
                    </div>
                    <div class="mb-3">
                        <label for="company_phone" class="form-label">No. Telepon Perusahaan</label>
                        <input type="text" class="form-control" id="company_phone" name="company_phone"
                            value="{{ $customer->company_phone_number }}" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="survey_id" class="form-label">Survey ID</label>
                    <input type="text" class="form-control" id="survey_id" name="survey_id"
                        value="{{ $customer->survey_id }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="extend_note" class="form-label">Catatan Tambahan</label>
                    <textarea type="text" class="form-control" id="extend_note" name="extend_note" rows="5" readonly>{{ $customer->extend_note }}</textarea>
                </div>
            </div>
            <div class="row p-1" style="border: 1px solid #808080; border-radius: 10px; margin-bottom:3em;">
                <p class="fw-bold"><span class="text-danger">*)</span> Data Pembayaran</p>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Bayar</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $customer->billing->billing_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Kontak Bayar</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                            value="{{ $customer->billing->billing_contact }}" readonly>
                    </div>
                    @php
                        $i = 1;
                    @endphp
                    @foreach (json_decode($customer->billing->billing_email) as $email)
                        <div class="mb-3">
                            <label for="email_address" class="form-label">Alamat Email {{ $i }}</label>
                            <input type="text" class="form-control" id="email_address_{{ $i }}"
                                name="email_address_{{ $i }}" value="{{ $email }}" readonly>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
            </div>
            <div class="row p-1" style="border: 1px solid #808080; border-radius: 10px; margin-bottom:6em;">
                <p class="fw-bold"><span class="text-danger">*)</span> Data Teknis</p>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Teknis</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $customer->technical->technical_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Kontak Teknis</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                            value="{{ $customer->technical->technical_contact }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email_address" class="form-label">Alamat Teknis</label>
                        <input type="text" class="form-control" id="email_address" name="email_address"
                            value="{{ $customer->technical->technical_email }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap 5.2 JS --}}
    <script src="{{ URL::to('plugin/bootstrap5.2.1/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
