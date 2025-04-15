@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">TAMBAH TUGAS</h4>
    <a href="/worker" class="btn btn-dark mb-3">kembali</a>

    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="/worker/store" method="post" autocomplete="off">
                        @csrf
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tugas</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">tambah tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
