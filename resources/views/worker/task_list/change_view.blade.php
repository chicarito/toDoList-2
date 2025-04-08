@extends('layout.app')
@section('content')
    <div class="mt-3">
        <a href="/worker/task-list/{{ $task->id }}" class="btn btn-primary">ganti tampilan</a>
    </div>

    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card my-3 border-2 w-100">
                    <div class="card-body bg-light">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">{{ $task->title }}</h4>
                                <hr>
                                <p class="card-text">
                                    {{ $task->desc ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($task->taskDetail as $item)
            <div class="col-md-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('asset/no_image.svg') }}"
                            alt="{{ $item->title_list }}" class="card-img-top" style="height: 250px;">
                        <h5 class="card-title my-3">{{ $item->title_list }}</h5>
                        <span
                            class="badge {{ $item->status ? 'text-bg-success' : 'text-bg-danger' }} mb-3">{{ $item->status ? 'selesai' : 'belum selesai' }}</span>
                        <p class="card-text">{{ $item->desc_list ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
