@extends('layout.app')
@section('content')
    <h3 class="text-center my-3">daftar pengguna</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <h5 class="card-title text-center">tambah pengguna</h5>
                    <hr>
                    <form action="/admin/store" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">nama pengguna</label>
                            <input type="text" name="name" id="name" class="form-control shadow-sm" required
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">e-mail pengguna</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror shadow-sm" required
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" name="password" id="password" class="form-control shadow-sm" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">role pengguna</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="" selected>--pilih role--</option>
                                <option value="tasker">Tasker</option>
                                <option value="worker">Worker</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 mt-3">tambah pengguna</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table">
                    <thead class="text-nowrap align-middle">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr class="text-nowrap align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="text-center">
                                    <a href="/admin/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                                    <a href="/admin/delete/{{ $item->id }}" class="btn btn-danger"
                                        onclick="return confirm('hapus?')">hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
