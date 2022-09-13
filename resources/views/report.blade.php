<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Request::segment(2) }}_form.pdf</title>

</head>

<body>
    <style>
        .header-pdf {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5em !important;
            padding-bottom: 1em !important;
            border-bottom: 2px solid #dedede;
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .mb-3 {
            margin-bottom: 1em !important;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 1rem;
        }

        label {
            margin: 0;
            display: block;
        }

        .form-control {
            box-shadow: none;
            font-size: 1rem;
            color: #343434 !important;
            width: 85%;
            padding: .375rem .75rem;
            line-height: 1.5;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            -webkit-border-radius: .25rem;
            border-radius: .25rem;
        }

        label {
            color: #000;
            font-weight: 600;
            text-transform: camel;
        }

        .form-control {
            color: #000 !important;
        }

        .new-page {
            page-break-after: always;
        }
    </style>

    <div class="header-pdf">
        <img src="assets/images/bg-nusanet.png" alt="" width="120" height="40">
    </div>

    <h2 style="text-align: center;">Formulir Digital Registrasi Internet</h2>

    <div class="{{ $customer->company_name != null ? 'row' : null }} mb-3 new-page"
        style="border: 1px solid #dedede; padding: 1em; border-radius: 15px;">
        <p style="font-weight: bold; margin-bottom: 1.5em;">*) Data Personal / Penanggungjawab</p>
        <div class="{{ $customer->company_name != null ? 'column' : null }}"
            style="{{ $customer->company_name != null ? null : 'padding-left: 2.5em;' }}">
            <div class="mb-3">
                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap"
                    value="{{ $customer->name }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" rows="5" readonly style="height: 150px;">{{ json_decode($customer->address)[0] }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_email">Alamat Email</label>
                <input class="form-control" type="text" name="alamat_email" id="alamat_email"
                    value="{{ $customer->email }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="identity_number">No. Identitas KTP</label>
                <input class="form-control" type="text" name="identity_number" id="identity_number"
                    value="{{ $customer->identity_number }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone_number">Nomor Telepon</label>
                <input class="form-control" type="text" name="phone_number" id="phone_number"
                    value="{{ $customer->phone_number }}" readonly>
            </div>
        </div>
        @if ($customer->company_name != null)
            <div class="column">
                <div class="mb-3">
                    <label class="form-label" for="company_name">Nama Perusahaan</label>
                    <input class="form-control" type="text" name="company_name" id="company_name"
                        value="{{ $customer->company_name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="company_address">Alamat Perusahaan</label>
                    <textarea class="form-control" name="company_address" id="company_address" rows="5" readonly
                        style="height: 150px;">{{ $customer->company_address }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="company_npwp">No.NPWP Perusahaan</label>
                    <input class="form-control" type="text" name="company_npwp" id="company_npwp"
                        value="{{ $customer->company_npwp }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="company_phone_number">No.Telepon Perusahaan</label>
                    <input class="form-control" type="text" name="company_phone_number" id="company_phone_number"
                        value="{{ $customer->company_phone_number }}" readonly>
                </div>
            </div>
        @endif
    </div>

    <div style="border: 1px solid #dedede; padding: 1em; border-radius: 15px; margin-bottom: 5em;">
        <p style="font-weight: bold; margin-bottom: 1.5em;">*) Data Pembayaran</p>
        <div class="mb-3">
            <label class="form-label" for="billing_name">Nama Bayar</label>
            <input class="form-control" type="text" name="billing_name" id="billing_name"
                value="{{ $customer->billing->billing_name }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label" for="billing_contact">Kontak Bayar</label>
            <input class="form-control" type="text" name="billing_contact" id="billing_contact"
                value="{{ $customer->billing->billing_contact }}" readonly>
        </div>
        @php
            $i = 1;
        @endphp
        @foreach (json_decode($customer->billing->billing_email) as $item)
            <div class="mb-3">
                <label class="form-label" for="alamat_email_{{ $i }}">Alamat Email
                    {{ $i }}</label>
                <input class="form-control" type="text" name="alamat_email_{{ $i }}"
                    id="alamat_email_{{ $i }}" value="{{ $item }}" readonly>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>

    <div class="new-page" style="border: 1px solid #dedede; padding: 1em; border-radius: 15px;">
        <p style="font-weight: bold; margin-bottom: 1.5em;">*) Data Teknis</p>
        <div class="mb-3">
            <label class="form-label" for="technical_name">Nama Teknis</label>
            <input class="form-control" type="text" name="technical_name" id="technical_name"
                value="{{ $customer->technical->technical_name }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label" for="technical_contact">Kontak Teknis</label>
            <input class="form-control" type="text" name="technical_contact" id="technical_contact"
                value="{{ $customer->technical->technical_contact }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label" for="technical_email">Alamat Email Teknis</label>
            <input class="form-control" type="text" name="technical_email" id="technical_email"
                value="{{ $customer->technical->technical_email }}" readonly>
        </div>
    </div>

    <div style="border: 1px solid #dedede; padding: 1em; border-radius: 15px;">
        <p style="font-weight: bold; margin-bottom: 1.5em;">*) Data Layanan</p>
    </div>
</body>

</html>
