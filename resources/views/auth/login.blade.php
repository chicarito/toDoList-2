<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('asset/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/sweetalert2.min.css') }}">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-3 mx-4 bg-light" style="width: 500px">
        <div class="card-body">
            <h3 class="text-center">Login</h3>
            <hr>
            <form action="/post-login" method="post" autocomplete="off">
                @csrf
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm"
                        placeholder="youremail@email.com" required>
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm" required>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-4">login</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('asset/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/sweetalert2.min.js') }}"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'error',
                text: '{{ session('error') }}',
                icon: 'error',
            })
        </script>
    @endif
</body>

</html>
