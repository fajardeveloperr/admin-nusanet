<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        <h1 class="app-page-title text-primary">
            <i class="fas fa-home me-1"></i>
            Dashboard
        </h1>

        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration bg-white" role="alert">
            <div class="inner">
                {{-- <img src="{{ asset('assets/images/animation_header.gif') }}" alt=""> --}}
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3 text-primary">
                        Selamat Datang di Sistem Manajemen Data Formulir Digital Registrasi Internet
                    </h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">
                            @php
                                $greetings = '';
                                $startPagi = strtotime('00:00:00');
                                $endPagi = strtotime('11:59:59');
                                $startSiang = strtotime('12:00:00');
                                $endSiang = strtotime('16:59:59');
                                $startMalam = strtotime('17:00:00');
                                $endMalam = strtotime('23:59:59');

                                if (time() >= $startPagi && time() <= $endPagi) {
                                    $greetings = 'Pagi';
                                } elseif (time() >= $startSiang && time() <= $endSiang) {
                                    $greetings = 'Siang';
                                } elseif (time() >= $startMalam && time() <= $endMalam) {
                                    $greetings = 'Malam';
                                }
                            @endphp
                            <div class="text-primary">
                                Selamat {{ $greetings }}, {{ ucwords(auth()->user()->name) }}
                            </div>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                </div>
                <!--//app-card-body-->

                {{-- </div><!--//inner--> --}}
            </div>
        </div>
        @if (auth()->user()->utype === 'AuthSales')
            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration bg-white" role="alert">
                <div class="inner">
                    {{-- <img src="{{ asset('assets/images/animation_header.gif') }}" alt=""> --}}
                    <div class="app-card-body p-3 p-lg-4">
                        <h6>Link khusus untuk pelanggan baru : </h6>
                        </br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="inputLinkNewCust"
                                value="{{ 'https://reg.nusa.net.id/new-member?am=' . auth()->user()->employee_id }}"
                                readonly>
                            <button class="btn btn-primary text-white" type="button" id="button-addon2" value="copy"
                                onclick="copyToClipboard('inputLinkNewCust')">
                                <i class="fa-solid fa-paste"></i>
                            </button>
                        </div>
                        <!--//row-->
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                    <!--//app-card-body-->

                    {{-- </div><!--//inner--> --}}
                </div>
            </div>
        @endif
    </div>
