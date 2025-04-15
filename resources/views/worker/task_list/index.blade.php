@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">{{ $task->title }}</h4>
    <a href="/worker" class="btn btn-dark mb-3">kembali</a>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-light">
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
        <div class="col-md-8">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover">
                    <thead class="text-nowrap align-middle">
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
                            <tr class="text-nowrap align-middle">
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
                                    <a href="/worker/task-list/do-task/{{ $item->id }}"
                                        class="btn btn-success">kerjakan</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
