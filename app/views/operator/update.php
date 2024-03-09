

<form action="<?= BASEURL;?>/operator/update" method="post">
    <input type="hidden" name="id_operator" value="<?= $data['id_operator'];?>">
    <label for="name_device">Nama Device</label>
    <input type="text" name="name_operator"  class="form-control mb-2" required value="<?= $data['name_operator'];?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
    </div>
</form>



