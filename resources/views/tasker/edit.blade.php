@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">EDIT TUGAS</h4>
    <a href="/tasker" class="btn btn-dark">kembali</a>

    <form action="/tasker/update/{{ $task->id }}" method="post" autocomplete="off">
        <div class="d-flex justify-content-center">
            <div class="card shadow-sm bg-light mt-3" style="width: 500px">
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Tugas</label>
                        <input type="text" name="title" id="title" class="form-control" required
                            value="{{ $task->title }}">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">edit tugas</button>
                </div>
            </div>
        </div>

        <h5 class="text-center mt-3">pilih pekerja</h5>
        <small class="text-sm text-danger">* tidak memilih pekerja, otomatis akan diberikan ke semua pekerja</small>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pekerja</th>
                    <th>email</th>
                    <th class="text-center">select all</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center">
                            <input type="checkbox" name="assignee[]" value="{{ $item->id }}"
                                {{ in_array($item->id, $selected_workers) ? 'checked' : '' }} class="form-check-inline">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection
