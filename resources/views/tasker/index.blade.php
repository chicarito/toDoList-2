@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR TUGAS</h4>
    <a href="/tasker/create" class="btn btn-dark">Tambah tugas</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Lorem, ipsum dolor.</td>
                <td class="text-center">
                    <a href="/tasker/edit" class="btn btn-primary">edit</a>
                    <a href="" class="btn btn-danger" onclick="return confirm('hapus?')">hapus</a>
                    <a href="/tasker/task-list" class="btn btn-warning">list tugas</a>
                    <a href="/tasker/worker-progress-task" class="btn btn-success">progres pekerja</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
