

<form action="<?= BASEURL;?>/device/update" method="post">
    <input type="hidden" name="id_device" value="<?= $data['id_device'];?>">
    <label for="name_device">Nama Device</label>
    <input type="text" name="name_device"  class="form-control mb-2" required value="<?= $data['name_device'];?>">
    <label for="Biaya Perjam">Biaya Perjam</label>
    <input type="text" name="harga_perjam"  class="form-control mb-2" required value="<?= $data['harga_perjam'];?>">
    <label for="Jumlah">Jumlah</label>
    <input type="text" name="jumlah"  class="form-control mb-2" required value="<?= $data['jumlah'];?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
    </div>
</form>



