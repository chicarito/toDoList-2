@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR TUGAS</h4>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th>Nama petugas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->creator->name }}</td>
                    <td class="text-center">
                        <a href="/quest/task-list/{{ $item->id }}" class="btn btn-success">lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
