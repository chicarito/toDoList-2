@extends('layout.app')
@section('content')
    <h3 class="text-center mt-3">daftar tugas</h3>
    <a href="/tasker/create" class="btn btn-success">tambah tugas</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="table">
            <thead class="text-nowrap align-middle">
                <tr>
                    <th>No</th>
                    <th>Judul tugas</th>
                    <th>Total list tugas</th>
                    <th>Status</th>
                    <th>Worker</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $item)
                    <tr class="text-nowrap align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->progress['total'] }} list tugas</td>
                        <td>
                            @if ($item->progress['completed'] == $item->progress['total'])
                                <span>
                                    <div class="badge text-bg-success">selesai</div>
                                </span>
                            @else
                                <span class="badge text-bg-danger">{{ $item->progress['completed'] }} task list
                                    selesai</span>
                            @endif
                        </td>
                        <td>{{ $item->assignee->name }}</td>
                        <td class="text-center">
                            <a href="/tasker/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                            <a href="/tasker/delete/{{ $item->id }}" class="btn btn-danger"
                                onclick="return confirm('hapus?')">hapus</a>
                            <a href="/tasker/task-list/{{ $item->id }}" class="btn btn-success">lihat</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
