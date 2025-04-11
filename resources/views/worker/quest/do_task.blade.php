@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">{{ $task_detail->title_list }}</h4>
    <a href="/quest/task-list/{{ $task_detail->id }}" class="btn btn-dark">kembali</a>
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm bg-light mt-3 mb-5" style="width: 600px">
            <div class="card-body">
                <form action="/quest/task-list/post-do-task/{{ $task_detail->id }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @if ($pivot?->image)
                        <img src="{{ asset('storage/' . $pivot->image) }}" alt="" class="card-img-top">
                    @else
                        <img src="{{ asset('asset/600x400.svg') }}" alt="" class="card-img-top">
                    @endif
                    <input type="file" name="image" id="image" class="form-control my-3">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-dark w-100">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
