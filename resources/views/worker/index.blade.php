@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR TUGAS</h4>
    <a href="/worker/create" class="btn btn-dark">Tambah tugas</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td class="text-center">
                        <a href="/worker/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
                        <a href="/worker/delete/{{ $item->id }}" class="btn btn-danger"
                            onclick="return confirm('hapus?')">hapus</a>
                        <a href="/worker/task-list/{{ $item->id }}" class="btn btn-warning">list tugas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
