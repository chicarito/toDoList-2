@extends('layout.app')
@section('content')
    <a href="/tasker" class="btn btn-danger mb-3 mt-5"
        onclick="return confirm('kembali akan menghapus semua progress!')">kembali</a>
    <form action="/tasker/update/{{ $task->id }}" method="post" autocomplete="off">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h4 class="text-center">{{ $task->title }}</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tugas</label>
                            <input type="text" name="title" id="title" class="form-control border-2"
                                value="{{ $task->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi Tugas</label>
                            <textarea name="desc" id="desc" class="form-control border-2">{{ $task->desc }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="assigned_to" class="form-label">Pilih Worker</label>
                            <select name="assigned_to" id="assigned_to" class="form-control" required>
                                <option value="" selected>--pilih worker--</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $task->assignee->id == $item->id ? 'selected' : '' }}>{{ $item->name }} -
                                        ({{ $item->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
