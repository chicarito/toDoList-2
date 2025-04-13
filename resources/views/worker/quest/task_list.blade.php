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
                <th>Diterima</th>
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
                    <td>
                        @if ($pivot?->accepted == null)
                            <span class="badge text-bg-warning">belum diperiksa</span>
                        @elseif ($pivot?->accepted == 'ditolak')
                            <span class="badge text-bg-danger">ditolak
                                ({{ $pivot?->status == true && $pivot?->accepted == 'ditolak' ? 'belum diperiksa ulang' : 'lihat catatan dari tasker' }})
                            </span>
                        @else
                            <span class="badge text-bg-success">diterima</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/quest/task-list/do-task/{{ $item->id }}" class="btn btn-success">kerjakan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($task_list as $item)
        @php
            $pivot = $item->workers->first()?->pivot;
        @endphp
        <div class="modal fade" id="modal-{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Catatan dari tasker</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $pivot?->reason_rejected }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
