@extends('layout.app')
@section('content')
    <h3 class="text-center mt-3">daftar list tugas {{ $task->title }}</h3>
    <a href="/quest" class="btn btn-dark">kembali</a>
    <a href="/quest/task-list/{{ $task->id }}/change-view" class="btn btn-primary">ganti tampilan</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="table">
            <thead class="text-nowrap align-middle">
                <tr>
                    <th>No</th>
                    <th>Judul list tugas</th>
                    <th>deskripsi list tugas</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($task->taskDetail as $item)
                    <tr class="text-nowrap align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title_list }}</td>
                        <td>{{ Str::limit($item->desc_list, 30, '...') ?? '-' }}</td>
                        <td>
                            <span
                                class="badge {{ $item->status ? 'text-bg-success' : 'text-bg-danger' }} ">{{ $item->status ? 'selesai' : 'belum selesai' }}</span>
                        </td>
                        <td class="text-center">
                            <a href="/quest/task-list/{{ $item->id }}/update" class="btn btn-primary">kerjakan</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
