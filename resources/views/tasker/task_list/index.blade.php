@extends('layout.app')
@section('content')
    <h3 class="text-center mt-3">daftar list tugas {{ $task->title }}</h3>
    <a href="/tasker" class="btn btn-dark">kembali</a>
    <a href="/tasker/task-list/{{ $task->id }}/create" class="btn btn-success">tambah list tugas</a>
    <a href="/tasker/task-list/{{ $task->id }}/change-view" class="btn btn-primary">ganti tampilan</a>
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
                            <a href="/tasker/task-list/{{ $item->id }}/edit" class="btn btn-primary">edit</a>
                            <a href="/tasker/task-list/{{ $item->id }}/delete" class="btn btn-danger"
                                onclick="return confirm('hapus?')">hapus</a>
                            <a href="/tasker/task-list/{{ $item->id }}/show" class="btn btn-success">lihat</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
