@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Progres Asep di Nama tugas</h4>
    <a href="/tasker/worker-progress-task" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama list tugas</th>
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
                    <a href="/tasker/worker-progress-task/task-list/show" class="btn btn-primary">lihat bukti pengerjaan</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Lorem, ipsum dolor.</td>
                <td>
                    <span class="badge text-bg-danger">belum selesai</span>
                </td>
                <td class="text-center">
                    <a href="/tasker/worker-progress-task/task-list/show" class="btn btn-primary disabled">lihat bukti pengerjaan</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
