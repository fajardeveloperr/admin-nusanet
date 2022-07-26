{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

{{-- <x-guest-layout> --}}

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Nusanet</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/nusa.jpeg') }}" alt="Nusanet">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
</head>

<body class="login-page">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="vendors/images/forgot-password.png" alt="">
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Lupa Password</h2>
                        </div>
                        @if (session()->has('successMessage'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="text-align: justify;">
                                {{ session('successMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif (session()->has('errorMessage'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="text-align: justify;">
                                {{ session('errorMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group custom">
                                <input class="form-control form-control-lg" id="email" type="email" name="email"
                                    :value="old('email')" placeholder="Masukkan Email" required autofocus>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0 flex justify-content-between">
                                        <a href="{{ route('login') }}">Ingat password?</a>
                                        <button type="submit"
                                            class="btn btn-primary btn-sm rounded text-center">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
{{-- </x-guest-layout> --}}
