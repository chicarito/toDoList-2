@extends('layout.app')
@section('content')
    <a href="/worker/task-list/{{ $task_detail->task->id }}" class="btn btn-dark mb-3 mt-5">kembali</a>
    <h4 class="text-center mb-3">update {{ $task_detail->title_list }}</h4>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="card-title">Judul: {{ $task_detail->title_list }}</h6>
                    <h6 class="card-title">Deskripsi: </h6>
                    <p class="card-text">{{ $task_detail->desc_list ?? '-' }}</p>
                    <span class="mb-3 badge {{ $task_detail->status ? 'text-bg-success' : 'text-bg-danger' }}">
                        {{ $task_detail->status ? 'Selesai' : 'Belum Selesai' }}
                    </span>
                    {{-- preview image --}}
                    <div class="mb-3 text-center">
                        <img id="previewImage"
                            src="{{ $task_detail->image ? asset('storage/' . $task_detail->image) : asset('asset/no_image.svg') }}"
                            alt="Preview Gambar" class="card-img-top img-fluid"
                            style="max-height: 300px; object-fit: cover;">
                    </div>

                    {{-- update tugas --}}
                    <form action="/worker/task-list/{{ $task_detail->id }}/post-update" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <div class="mb-3">
                            <label for="imageInput" class="form-label">Pilih Gambar:</label>
                            <input type="file" class="form-control" id="imageInput" name="image" accept="image/*"
                                onchange="previewFile()">
                        </div>
                        <button type="submit" class="btn btn-primary">Update tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewFile() {
            const file = document.querySelector('#imageInput').files[0];
            const preview = document.querySelector('#previewImage');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
