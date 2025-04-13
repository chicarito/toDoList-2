<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList @if (!empty($title))
            | {{ $title }}
        @endif
    </title>
    <link rel="stylesheet" href="{{ asset('asset/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/sweetalert2.min.css') }}">
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('asset/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/datatables.min.js') }}"></script>
    <script src="{{ asset('asset/sweetalert2.min.js') }}"></script>

    @if (session('status'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('status') }}',
                icon: 'success',
            })
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                columnDefs: [{
                    orderable: false,
                    target: -1,
                }]
            });
        })
    </script>
</body>

</html>
