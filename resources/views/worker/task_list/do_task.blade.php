@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">nama list tugas</h4>
    <a href="/worker/task-list" class="btn btn-dark">kembali</a>
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm bg-light mt-3 mb-5" style="width: 600px">
            <div class="card-body">
                <form action="" method="post" autocomplete="off">
                    @csrf
                    <img src="{{ asset('asset/600x400.svg') }}" alt="" class="card-img-top">
                    <input type="file" name="" id="" class="form-control my-3">
                    <button type="submit" class="btn btn-dark w-100">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
