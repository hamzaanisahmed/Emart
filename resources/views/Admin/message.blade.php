{{-- Error Alert Message --}}
@if (Session::has('error'))
    <script>
        swal("Error", "{{ Session::get('error') }}",
        {
            icon: 'error',
            button: false,
            timer: 3300,

        });
    </script>
@endif


{{-- Success Alert Message --}}
@if (Session::has('success'))
    <script>
        swal("{{ Session::get('success') }}",
        {
            icon: 'success',
            button: false,
            timer: 1500,
        });
    </script>
@endif
