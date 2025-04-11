@extends('layout.app')
@section('content')
    <h4 class="text-center mt-4">DAFTAR LIST TUGAS</h4>
    <a href="/quest" class="btn btn-dark">kembali</a>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama tugas</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task_list as $item)
                @php
                    $pivot = $item->workers->first()?->pivot;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title_list }}</td>
                    <td>
                        @if ($pivot?->status)
                            <span class="badge text-bg-success">selesai</span>
                        @else
                            <span class="badge text-bg-danger">belum selesai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/quest/task-list/do-task/{{ $item->id }}" class="btn btn-success">kerjakan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
