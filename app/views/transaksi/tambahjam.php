<form action="<?= BASEURL;?>/transaksi/tambahjam" method="post">
<input type="hidden" name="id_transaksi" id="" value="<?= $data['id_transaksi'];?>">
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="menit">Menit</label>
        <input type="text" class="form-control form-control-user" id="exampleTV" name="menit" required value="0">
    </div>
    <div class="col-sm-6">
    <label for="paket">Harga</label>
        <input type="text" class="form-control form-control-user" id="examplePaket" name="tambah_harga" required value="0">
    </div>
</div>

<label for="Minuman">Minuman</label>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="minum">3K</label>
        <input type="text" class="form-control form-control-user"  name="tiga" value="0" required>
    </div>
    <div class="col-sm-6">
    <label for="minum">4K</label>
        <input type="text" class="form-control form-control-user" name="empat" value="0" required>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>
