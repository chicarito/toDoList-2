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
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title_list }}</td>
                    <td>
                        @if ($item->pivotStatus == true)
                            <span class="badge text-bg-success">selesai</span>
                        @else
                            <span class="badge text-bg-danger">belum selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ asset('storage/' . $item->pivotImage) }}" target="_blank"
                            class="btn btn-primary {{ $item->pivotImage ?? 'disabled' }}">lihat bukti
                            pengerjaan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
