@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Pekerja di nama tugas</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama petugas</th>
                <th>Email petugas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>asep</td>
                <td>asep@gmail.com</td>
                <td class="text-center">
                    <a href="/tasker/worker-progress-task/task-list" class="btn btn-primary">lihat progres</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
