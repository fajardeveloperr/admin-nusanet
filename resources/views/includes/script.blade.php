<!-- Javascript -->
<script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Charts JS -->
<script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/index-charts.js') }}"></script>

<!-- Page Specific JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script>
    window.addEventListener('swal', function(e) {
        Swal.fire(e.detail);
    });
</script>


@livewireScripts
