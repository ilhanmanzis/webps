<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/transaksi/create" method="post">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="tv">No TV</label>
              <input type="text" class="form-control form-control-user" id="exampleTV" name="tv" required>
            </div>
            <div class="col-sm-6">
            <label for="paket">Paket</label>
                <input type="text" class="form-control form-control-user" id="examplePaket" name="paket" required>
            </div>
        </div>
        <label for="device">Jenis Device</label>
        <select name="device" class="form-control mb-2">
          <?php 
            foreach($data['device'] as $device):
            echo "<option value=" . $device['id_device'] . ">".$device['name_device']."</option>";
          endforeach;   
          ?>
        </select>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="mulai">Mulai</label>
              <input type="time" class="form-control form-control-user" id="exampleSelesai" name="mulai" required>
            </div>
            <div class="col-sm-6">
            <label for="selesai">Selesai</label>
                <input type="time" class="form-control form-control-user" id="exampleSelesai" name="selesai" required>
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
        <label for="bayar">Bayar</label>
        <select name="bayar" class="form-control mb-2">
          <option value="cash">Cash</option>
          <option value="qris">Qris</option>
        </select>
        <label for="keterangan">keterangan</label>
        <input type="text" class="form-control form-control-user" id="exampleKeterangan" name="keterangan" value="Lunas" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>