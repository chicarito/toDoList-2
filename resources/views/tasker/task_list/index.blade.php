@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Nama tugas</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm bg-light mt-3" style="width: 500px">
            <div class="card-body">
                <form action="" method="post" autocomplete="off">
                    @csrf
                    {{-- <input type="hidden" name="created_by" value="{{ Auth::id() }}"> --}}
                    <div class="mb-3">
                        <label for="title_list" class="form-label">Judul List Tugas</label>
                        <input type="text" name="title_list" id="title_list" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">tambah list tugas</button>
                </form>
            </div>
        </div>
    </div>
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
                    <a href="/tasker/task-list/edit" class="btn btn-primary">edit</a>
                    <a href="" class="btn btn-danger" onclick="return confirm('hapus?')">hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
