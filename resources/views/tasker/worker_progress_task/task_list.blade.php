@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">Progres {{ $user->name }} di {{ $task->title }}</h4>
    <a href="/tasker/worker-progress-task/{{ $task->id }}" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama list tugas</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task->taskDetail as $item)
                @php
                    $pivot = $item->workers()->where('user_id', $user->id)->first()?->pivot;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title_list }}</td>
                    <td>
                        {{-- <span
                            class="badge {{ $item->status ? 'text-bg-success' : 'text-bg-danger' }}">{{ $item->status ? 'selesai' : 'belum selesai' }}</span> --}}
                        @if ($pivot?->status)
                            <span class="badge text-bg-success">selesai</span>
                        @else
                            <span class="badge text-bg-danger">belum selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/tasker/worker-progress-task/task-list/show"
                            class="btn btn-primary {{ $item->status ? '' : 'disabled' }}">lihat bukti
                            pengerjaan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
