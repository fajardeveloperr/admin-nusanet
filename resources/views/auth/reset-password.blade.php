{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
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
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/nusanett.png')}}" alt="Nusanet">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
    </head>
    <body class="login-page">
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('vendors/images/forgot-password.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Reset Password</h2>
                            </div>
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="input-group custom">
                                    <input class="form-control form-control-lg" id="email" class="block mt-1 w-full" type="email" name="email" value="{{$request->email}}" required autofocus>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" required autocomplete="new-password" placeholder="New Password">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-padlock"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi New Password">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0 flex justify-content-between">
                                            <button type="submit" class="btn btn-dark btn-sm rounded text-center">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    {{-- </x-guest-layout> --}}
