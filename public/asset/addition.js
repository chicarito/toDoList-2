document.getElementById("add-task").addEventListener("click", () => {
    const taskList = document.getElementById("task-list");

    const taskDiv = document.createElement("div");
    taskDiv.classList.add("card", "bg-light", "mt-3", "task-item");
    taskDiv.innerHTML = `
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title_list[]" class="form-control border-2" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="desc_list[]" class="form-control border-2"></textarea>
            </div>
            <button type="button" class="btn btn-danger remove-task">Hapus</button>
        </div>`;

    taskList.appendChild(taskDiv);
});

document.addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-task")) {
        event.target.closest(".task-item").remove();
    }
});

function previewFile() {
    const file = document.querySelector("#imageInput").files[0];
    const preview = document.querySelector("#previewImage");

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
