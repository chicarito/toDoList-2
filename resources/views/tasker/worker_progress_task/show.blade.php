@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">nama list tugas</h4>

    <a href="/tasker/worker-progress-task/task-list" class="btn btn-dark">kembali</a>
    <div class="d-flex justify-content-center mb-5">
        <div class="card shadow-sm bg-light mt-3">
            <div class="card-body">
                <img src="{{ asset('asset/no_image.svg') }}" alt="" class="card-img">
            </div>
        </div>
    </div>
@endsection
