@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">{{ $task->title }}</h4>
    <a href="/worker" class="btn btn-dark">kembali</a>
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm bg-light mt-3" style="width: 500px">
            <div class="card-body">
                <form action="/worker/task-list/store" method="post" autocomplete="off">
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
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task->taskDetail as $item)
                @php
                    $pivot = $item->workers->first()?->pivot;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title_list }}</td>
                    <td>
                        @if ($pivot?->status)
                            <span class="badge text-bg-success">selesai</span>
                        @else
                            <span class="badge text-bg-danger">belum selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/worker/task-list/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                        <a href="" class="btn btn-danger" onclick="return confirm('hapus?')">hapus</a>
                        <a href="/worker/task-list/do-task/{{ $item->id }}" class="btn btn-success">kerjakan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
