@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">{{ $task_detail->title_list }}</h4>
    <a href="/quest/task-list/{{ $task_detail->task->id }}" class="btn btn-dark mb-3">kembali</a>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-light">
                    <form action="/quest/task-list/post-do-task/{{ $task_detail->id }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($pivot?->image)
                            <img src="{{ asset('storage/' . $pivot->image) }}" alt="" class="card-img-top">
                        @else
                            <img src="{{ asset('asset/600x400.svg') }}" alt="" class="card-img-top">
                        @endif
                        @if ($pivot?->accepted == 'ditolak' && $pivot?->status == false)
                            <div class="card mt-3">
                                <div class="card-body">
                                    catatan dari tasker:
                                    <br>
                                    {{ $pivot?->reason_rejected ?? 'bukti tugas anda ditolak' }}
                                </div>
                            </div>
                        @endif
                        @if ($pivot?->status == true || $pivot?->accepted == 'diterima')
                        @else
                            <input type="file" name="image" id="image" class="form-control my-3">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn btn-dark w-100">submit</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
