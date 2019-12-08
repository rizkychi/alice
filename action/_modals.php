<!-- Modal Add Forum Post -->
<div class="modal fade" id="createForumPost" tabindex="-1" role="dialog">
  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="h5 modal-title">Buat Post Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <!-- Body -->
            <!-- Material input -->
            <div class="mb-3">
                <input type="text" id="postTitle" name="title" placeholder="Tulis judul..." class="form-control" required>
            </div>
            <div class="form-group purple-border mb-1">
                <textarea class="form-control" name="content" rows="3" placeholder="Tulis isi post..." required></textarea>
            </div>
            <!--Blue select-->
            <select class="mdb-select mt-3 w-50" name="course" searchable="Cari mata kuliah" required>
                <option value="1" disabled selected>Pilih mata kuliah</option>
                <option value="2">example 1</option>
                <option value="3">example 2</option>
                <option value="4">example 3</option>
            </select>
            <!-- Body -->
            <div class="float-right mt-2">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-success">Kirim</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Upload Image -->
<div id="uploadimageModal" class="modal" tabindex="-1" role="dialog">
  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="h5 modal-title">Unggah dan potong gambar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Body -->
          <div id="image_demo" class="mt-2" style="height:auto;"></div>
          <!-- Body -->
          <div class="float-right mt-2">
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
              <button type="button" id="cropImage" class="btn btn-sm btn-success">Unggah</button>
          </div>
      </div>
    </div>
  </div>
</div>
