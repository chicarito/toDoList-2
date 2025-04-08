@extends('layout.app')
@section('content')
    <a href="/tasker/task-list/{{ $task_detail->task->id }}" class="btn btn-danger mb-3 mt-5"
        onclick="return confirm('kembali akan menghapus semua progress!')">kembali</a>
    <form action="/tasker/task-list/{{ $task_detail->id }}/update" method="post" autocomplete="off">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h4 class="text-center">edit {{ $task_detail->title_list }}</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="title_list" class="form-label">Judul list tugas</label>
                            <input type="text" name="title_list" id="title_list" class="form-control border-2"
                                value="{{ $task_detail->title_list }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc_list" class="form-label">Deskripsi list tugas</label>
                            <textarea name="desc_list" id="desc_list" class="form-control border-2">{{ $task_detail->desc_list }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
