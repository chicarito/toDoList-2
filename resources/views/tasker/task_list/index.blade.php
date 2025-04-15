@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">{{ $task->title }}</h4>
    <a href="/tasker" class="btn btn-dark mb-3">kembali</a>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="/tasker/task-list/store-task-list" method="post" autocomplete="off">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <div class="mb-3">
                            <label for="title_list" class="form-label">Judul List Tugas</label>
                            <input type="text" name="title_list" id="title_list" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">tambah list tugas</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama list tugas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($task->taskDetail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title_list }}</td>
                                <td class="text-center">
                                    <a href="/tasker/task-list/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                                    <a href="/tasker/task-list/delete/{{ $item->id }}" class="btn btn-danger"
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
