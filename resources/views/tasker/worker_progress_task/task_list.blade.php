@extends('layout.app')
@section('content')
    <h4 class="text-center my-3">Progres {{ $user->name }} di {{ $task->title }}</h4>
    <a href="/tasker/worker-progress-task/{{ $task->id }}" class="btn btn-dark">kembali</a>
    <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover">
            <thead class="text-nowrap align-middle">
                <tr>
                    <th>No</th>
                    <th>Nama list tugas</th>
                    <th>Status</th>
                    <th>Diterima</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task->taskDetail as $item)
                    <tr class="text-nowrap align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title_list }}</td>
                        <td>
                            @if ($item->pivotStatus == true)
                                <span class="badge text-bg-success">selesai</span>
                            @else
                                <span class="badge text-bg-danger">belum selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->pivotAccepted == null)
                                <span class="badge text-bg-warning">belum diperiksa</span>
                            @elseif ($item->pivotAccepted == 'diterima')
                                <span class="badge text-bg-success">diterima</span>
                            @else
                                <span class="badge text-bg-danger">ditolak</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $item->id }}" {{ $item->pivotImage ?? 'disabled' }}>
                                lihat bukti pengerjaan
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($task->taskDetail as $item)
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->title_list }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ asset('storage/' . $item->pivotImage) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $item->pivotImage) }}" alt=""
                                        class="card-img-top">
                                </a>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                {{-- diterima/ditolak --}}
                                <form
                                    action="/tasker/task-list/{{ $user->id }}/validation-task-list/{{ $item->id }}"
                                    method="post">
                                    @csrf
                                    <select name="accepted" id="accepted" class="form-control" required>
                                        <option value="" selected disabled>Pilih status bukti pengerjaan</option>
                                        <option value="diterima"
                                            {{ $item->pivotAccepted == 'diterima' ? 'selected' : '' }}>Terima</option>
                                        <option value="ditolak" {{ $item->pivotAccepted == 'ditolak' ? 'selected' : '' }}>
                                            Tolak</option>
                                    </select>

                                    <label for="reason_rejected" class="form-label text-sm text-danger mt-3">
                                        * Kosongkan jika diterima
                                    </label>
                                    <textarea name="reason_rejected" id="reason_rejected" class="form-control" placeholder="Alasan ditolak">{{ $item->pivotReasonRejected }}</textarea>
                                    <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
