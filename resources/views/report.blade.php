<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet"> --}}

    <title>Form Internet Registration</title>

    {{-- <style media="print">
        /* * {
            font-family: 'Open Sans', sans-serif;
        } */

        /*
        .col-sm-6 {
            column-gap: 50px;
            column-count: 2;
        }

        .mb-4 {
            margin-bottom: 4em;
        }

        .mb-3 {
            margin-bottom: 2em;
        }

        .form-control {
            border-color: whitesmoke;
            width: 100%;
            height: 100%;
            border-radius: 5px;
            padding: 1%;
        }

        .form-control:focus-visible {
            outline: none;
        }

        .input-group {
            display: flex;
        }

        .input-group>.label {
            width: 40%;
            padding-right: 10px;
        }

        .input-group>.input {
            width: 60%;
        }

        @media only screen and (max-width: 991px) {
            .input-group {
                display: flex;
                flex-wrap: wrap;
            }

            .input-group>.label {
                width: 100%;
                padding-right: 10px;
            }

            .input-group>.input {
                width: 100%;
            }
        } */
    </style> --}}
</head>

<body>
    <div class="pdfReport" style="background-color: #F0D290 !important; border-radius: 15px; height: 100%;">
        <header
            style="background-color: #CA965C; padding: .5em 0 0 1em; border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <a href="#" style="display: inline-block; margin-right: 150px;">
                <img class="img-fluid" src="{{ public_path() . '/assets/images/Background.png' }}" alt=""
                    height="35" style="background: #fff; padding: 0.5em 0.5em; border-radius: 15px;">
            </a>
            <h2 style="display: inline-block;text-align: center; font-weight: bold; color: #fff; padding: 0;">
                Internet Access Registration Form
            </h2>
        </header>

        <section class="row" style="padding: 3em 0;">
            <div class="column" style="padding: 0 3em;">
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Nama Penanggung Jawab
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab"
                            value="{{ $customer->name }}" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="tempattanggallahir" style="width: 100%; padding-right: 10px;">
                        Tempat / Tanggal Lahir
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="tempattanggallahir" id="tempattanggallahir"
                            value="" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Jenis Kelamin
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab"
                            value="" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        No. Identitas
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab"
                            value="{{ $customer->identity_number }}" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        E-mail
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab"
                            value="{{ $customer->email }}" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Alamat
                    </div>
                    <div class="input" style="width: 100%;">
                        <textarea class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab" readonly>{{ json_decode($customer->address)[0] }}</textarea>
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Telepon
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="{{ $customer->phone_number }}" readonly
                            style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        No. NPWP
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Alamat Pemasangan
                    </div>
                    <div class="input" style="width: 100%;">
                        <textarea class="form-control" type="text" name="namapenanggungjawab" id="namapenanggungjawab" readonly>{{ $customer->address }}</textarea>
                    </div>
                </div>
            </div>
            <div class="column" style="padding: 0 3em;">
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Nama Perusahaan
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="{{ $customer->company_name }}" readonly
                            style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Nama Usaha
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="{{ $customer->company_name }}" readonly
                            style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Jenis Usaha
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Jabatan
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="" readonly style="width: 100%;">
                    </div>
                </div>
                <div class="mb-3 input-group" style="display: flex; flex-wrap: wrap; margin-bottom: .5em;">
                    <div class="label" for="namapenanggungjawab" style="width: 100%; padding-right: 10px;">
                        Telepon Seluler
                    </div>
                    <div class="input" style="width: 100%;">
                        <input class="form-control" type="text" name="namapenanggungjawab"
                            id="namapenanggungjawab" value="{{ $customer->company_phone_number }}" readonly
                            style="width: 100%;">
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
