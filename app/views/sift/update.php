

<form action="<?= BASEURL;?>/sift/update" method="post">
    <input type="hidden" name="id_sift" value="<?= $data['id_sift'];?>">
    <label for="name_device">Nama Sift</label>
    <input type="text" name="name_sift"  class="form-control mb-2" required value="<?= $data['name_sift'];?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
    </div>
</form>



