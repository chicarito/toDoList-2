@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR LIST TUGAS</h4>
    <a href="/quest" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Lorem, ipsum dolor.</td>
                <td>
                    <span class="badge text-bg-success">selesai</span>
                </td>
                <td class="text-center">
                    <a href="/quest/task-list/do-task" class="btn btn-success">lihat</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Lorem, ipsum dolor.</td>
                <td>
                    <span class="badge text-bg-danger">belum selesai</span>
                </td>
                <td class="text-center">
                    <a href="/quest/task-list/do-task" class="btn btn-success">kerjakan</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
