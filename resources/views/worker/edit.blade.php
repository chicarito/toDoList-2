@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">EDIT TUGAS</h4>
    <a href="/worker" class="btn btn-dark">kembali</a>

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
                    <button type="submit" class="btn btn-dark w-100">edit tugas</button>
                </div>
            </div>
        </div>
    </form>
@endsection
