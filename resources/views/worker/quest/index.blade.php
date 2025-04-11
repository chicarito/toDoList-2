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
            <tr>
                <td>1</td>
                <td>Lorem, ipsum dolor.</td>
                <td>Agus</td>
                <td class="text-center">
                    <a href="/quest/task-list" class="btn btn-success">lihat</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
