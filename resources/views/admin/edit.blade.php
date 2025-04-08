@extends('layout.app')
@section('content')
    <a href="/admin" class="btn btn-danger my-3" onclick="return confirm('kembali akan menghapus progress?')">kembali</a>
    <div class="form-user d-flex justify-content-center">
        <div class="card shadow bg-light p-4 mx-3" style="width: 500px">
            <h4 class="text-center">{{ $user->name }}</h4>
            <hr>
            <form action="/admin/update/{{ $user->id }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">nama pengguna</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm" required
                        value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">e-mail pengguna</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror shadow-sm" required
                        value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="tasker" {{ $user->role == 'tasker' ? 'selected' : '' }}>tasker</option>
                        <option value="worker" {{ $user->role == 'worker' ? 'selected' : '' }}>worker</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-3">submit</button>
            </form>
        </div>
    </div>
@endsection
