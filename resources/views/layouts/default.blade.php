<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" width="100%" href="{{ asset('vendors/images/nusa.jpeg') }}">
    <title>Nusanet</title>

    @include('includes.style')

</head>

<body class="app">
    @include('includes.header')

    <div class="app-wrapper">

        @include('sweetalert::alert')

        {{ $slot }}

        @include('includes.footer')

    </div>
    <!--//app-wrapper-->


    @include('includes.script')

</body>

</html>
