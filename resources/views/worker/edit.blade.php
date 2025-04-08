@extends('layout.app')
@section('content')
    <a href="/worker" class="btn btn-danger mb-3 mt-5"
        onclick="return confirm('kembali akan menghapus semua progress!')">kembali</a>
    <form action="/worker/update/{{ $task->id }}" method="post" autocomplete="off">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h4 class="text-center">Edit {{ $task->title }}</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tugas</label>
                            <input type="text" name="title" id="title" class="form-control border-2" required value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi Tugas</label>
                            <textarea name="desc" id="desc" class="form-control border-2">{{ $task->desc }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
