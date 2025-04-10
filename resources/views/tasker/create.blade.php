@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">TAMBAH TUGAS</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>

    <form action="" method="post" autocomplete="off">
        <div class="d-flex justify-content-center">
            <div class="card shadow-sm bg-light mt-3" style="width: 500px">
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Tugas</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">tambah tugas</button>
                </div>
            </div>
        </div>

        <h5 class="text-center mt-3">pilih pekerja</h5>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pekerja</th>
                    <th>email</th>
                    <th class="text-center">select all
                        <input type="checkbox" name="" id="" class="form-check-inline">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>asep</td>
                    <td>asep@gmail.com</td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="checkbox" class="form-check-inline">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ujang</td>
                    <td>ujang@gmail.com</td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="checkbox" class="form-check-inline">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
