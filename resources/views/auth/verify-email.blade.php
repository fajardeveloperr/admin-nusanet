{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}

{{-- <x-guest-layout> --}}
<x-jet-authentication-card>
    <x-slot name="logo">
        {{-- <x-jet-authentication-card-logo /> --}}

        <head>
            <!-- Basic Page Info -->
            <meta charset="utf-8">
            <title>Nusanet</title>
            <!-- Site favicon -->
            <link rel="icon" type="image" sizes="32x32" href="{{ asset('vendors/images/nusa.jpeg') }}" alt="Nusanet">

            <!-- Mobile Specific Metas -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
                rel="stylesheet">
            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
        </head>

        <img style="margin-left:45%; padding-top:15%;" src="{{ asset('vendors/images/nusanet.png') }}" alt="Nusanet"
            class="light-logo" width="120">
    </x-slot>
    <div style="margin-left: 10%" class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-2 d-flex align-items-center justify-content-center">
        <form method="POST" action="{{ route('verification.send') }}" class="mr-4">
            @csrf
            <div>
                <button type="submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div>
                <button type="submit" class="underline text-md text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </div>
        </form>
    </div>
</x-jet-authentication-card>
{{-- </x-guest-layout> --}}
