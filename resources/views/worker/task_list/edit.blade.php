@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Edit list tugas</h4>
    <a href="/worker/task-list" class="btn btn-dark mb-3">kembali</a>
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="/worker/task-list/update/{{ $task_detail->id }}" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="title_list" class="form-label">Judul List Tugas</label>
                            <input type="text" name="title_list" id="title_list" class="form-control"
                                value="{{ $task_detail->title_list }}" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">edit list tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
