@if (session()->has('sudam-sweet-alert'))
    @once
        <script src="{{ config('sudam-sweet-alert.cdn') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @endonce

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire(@json(session('sudam-sweet-alert')));
        });
    </script>
@endif
