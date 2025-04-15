@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">TAMBAH TUGAS</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>
    <form action="/tasker/store" method="post" autocomplete="off">

        <div class="row">
            <div class="col-md-4">
                <div class="d-flex justify-content-center mb-3">
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
            </div>
            <div class="col-md-8">
                <small class="text-sm text-danger">* tidak memilih pekerja, otomatis akan diberikan ke semua pekerja</small>
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover">
                        <thead class="text-nowrap align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama pekerja</th>
                                <th>email</th>
                                <th class="text-center">pilih pekerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $item)
                                <tr class="text-nowrap align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="assignee[]" value="{{ $item->id }}" id="checkbox"
                                            class="form-check-inline">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    {{-- <form action="/tasker/store" method="post" autocomplete="off">
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
        <small class="text-sm text-danger">* tidak memilih pekerja, otomatis akan diberikan ke semua pekerja</small>
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover">
                <thead class="text-nowrap align-middle">
                    <tr>
                        <th>No</th>
                        <th>Nama pekerja</th>
                        <th>email</th>
                        <th class="text-center">pilih pekerja</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workers as $item)
                        <tr class="text-nowrap align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">
                                <input type="checkbox" name="assignee[]" value="{{ $item->id }}" id="checkbox"
                                    class="form-check-inline">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form> --}}
@endsection
