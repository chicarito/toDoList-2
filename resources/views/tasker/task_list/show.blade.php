@extends('layout.app')
@section('content')
    <a href="/tasker/task-list/{{ $task_detail->task->id }}" class="btn btn-dark mb-3 mt-5">kembali</a>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm bg-light">
                <div class="card-body">
                    @if ($task_detail->image)
                        <img src="{{ asset('storage/' . $task_detail->image) }}" alt="" class="card-img-top">
                    @else
                        <img src="{{ asset('asset/no_image.svg') }}" alt="" class="card-img-top">
                    @endif

                    <h4 class="card-text my-3">{{ $task_detail->title_list }}</h4>
                    <span
                        class="badge {{ $task_detail->status ? 'text-bg-success' : 'text-bg-danger' }} mb-3">{{ $task_detail->status ? 'selesai' : 'belum selesai' }}</span>
                    <p class="card-text">
                        {{ $task_detail->desc_list ?? '-' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
