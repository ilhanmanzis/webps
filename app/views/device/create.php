<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Device</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/device/create" method="post">
            <label for="name_device">Nama Device</label>
            <input type="text" name="name_device"  class="form-control mb-2" required>
            <label for="Biaya Perjam">Biaya Perjam</label>
            <input type="text" name="harga_perjam"  class="form-control mb-2" required>
            <label for="Jumlah">Jumlah</label>
            <input type="text" name="jumlah"  class="form-control mb-2" required>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>