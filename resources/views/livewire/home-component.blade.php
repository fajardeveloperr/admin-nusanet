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
                            <div class="text-primary">{{ ucwords(auth()->user()->name) }}</div>
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
    </div>
