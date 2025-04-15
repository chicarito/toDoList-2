@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR TUGAS</h4>
    <a href="/tasker/create" class="btn btn-dark">Tambah tugas</a>
    <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover">
            <thead class="text-nowrap align-middle">
                <tr>
                    <th>No</th>
                    <th>Nama tugas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                    <tr class="text-nowrap align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td class="text-center">
                            <a href="/tasker/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                            <a href="/tasker/delete/{{ $item->id }}" class="btn btn-danger"
                                onclick="return confirm('hapus?')">hapus</a>
                            <a href="/tasker/task-list/{{ $item->id }}" class="btn btn-warning">list tugas</a>
                            <a href="/tasker/worker-progress-task/{{ $item->id }}" class="btn btn-success">progres
                                pekerja</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
