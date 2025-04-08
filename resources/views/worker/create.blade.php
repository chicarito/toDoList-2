@extends('layout.app')
@section('content')
    <a href="/worker" class="btn btn-danger mb-3 mt-5"
        onclick="return confirm('kembali akan menghapus semua progress!')">kembali</a>
    <form action="/worker/store" method="post" autocomplete="off">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light">
                    <div class="card-body">
                        <h4 class="text-center">Tambah Tugas</h4>
                        <hr>
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                        <input type="hidden" name="assigned_to" value="{{ Auth::id() }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Tugas</label>
                            <input type="text" name="title" id="title" class="form-control border-2" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi Tugas</label>
                            <textarea name="desc" id="desc" class="form-control border-2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">submit</button>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-5">
                <hr>
                <h4 class="text-center mt-3">List Tugas</h4>
                <button type="button" class="btn btn-primary" id="add-task">Tambah List Tugas</button>
                <div class="card bg-light mt-3">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title_list" class="form-label">Judul</label>
                                    <input type="text" name="title_list[]" id="title_list" class="form-control border-2"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="desc_list" class="form-label">deskripsi</label>
                                    <textarea name="desc_list[]" id="desc_list" class="form-control border-2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="task-list">
                </div>
            </div>
        </div>
    </form>
@endsection
