@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Pekerja di {{ $task->title }}</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama petugas</th>
                <th>Email petugas</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td class="text-center">
                        <a href="/tasker/{{ $item->id }}/worker-progress-task/{{ $task->id }}"
                            class="btn btn-primary">lihat progres</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
