<form action="<?= BASEURL;?>/transaksi/update" method="post">
    <div class="form-group row">
        <input type="hidden" name="id_transaksi" value="<?=$data['transaksi']['id_transaksi']?>">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="tv">No TV</label>
            <input type="text" class="form-control form-control-user" id="exampleTV" name="tv" required value="<?= $data['transaksi']['no_tv']?>">
        </div>
        <div class="col-sm-6">
        <label for="paket">Paket</label>
            <input type="text" class="form-control form-control-user" id="examplePaket" name="paket" value="<?=$data['transaksi']['paket']?>" required>
        </div>
    </div>
    <label for="device">Jenis Device</label>
    <select name="device" class="form-control mb-2">
        <?php 
        foreach($data['device'] as $device):
            if($data['transaksi']['id_device']==$device['id_device']){
                $selected='selected';
            }else{
                $selected='';
            }
        echo "<option $selected value=" . $device['id_device'] . ">".$device['name_device']."</option>";
        endforeach;   
        ?>
    </select>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="mulai">Mulai</label>
            <input type="time" class="form-control form-control-user" id="exampleSelesai" name="mulai" required value="<?=$data['transaksi']['jam_mulai']?>">
        </div>
        <div class="col-sm-6">
        <label for="selesai">Selesai</label>
            <input type="time" class="form-control form-control-user" id="exampleSelesai" name="selesai" required value="<?=$data['transaksi']['jam_selesai']?>">
        </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="menit">Tambah Menit</label>
        <input type="text" class="form-control form-control-user" id="exampleTV" name="menit" required value="<?=$data['transaksi']['tambah_waktu'];?>">
    </div>
    <div class="col-sm-6">
    <label for="paket">Harga Tambah</label>
        <input type="text" class="form-control form-control-user" id="examplePaket" name="tambah_harga" required value="<?=$data['transaksi']['tambah_harga']?>">
    </div>
</div>
    <label for="Minuman">Minuman</label>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="minum">3K</label>
            <input type="text" class="form-control form-control-user"  name="tiga" required value="<?=$data['transaksi']['minuman_3k']?>">
        </div>
        <div class="col-sm-6">
        <label for="minum">4K</label>
            <input type="text" class="form-control form-control-user" name="empat" required value="<?=$data['transaksi']['minuman_4k']?>">
        </div>
    </div>
    <label for="bayar">Bayar</label>
    <select name="bayar" class="form-control mb-2">
        <?php
        if($data['transaksi']['bayar']=="cash"){
            $selected_cash='selected';
            $selected_qris='';
        }else{
            $selected_qris='selected';
            $selected_cash='';
            
        }
        ?>
        <option value="cash" <?= $selected_cash;?>>Cash</option>
        <option value="qris" <?= $selected_qris;?>>Qris</option>
    </select>
    <label for="keterangan">keterangan</label>
    <input type="text" class="form-control form-control-user" id="exampleKeterangan" name="keterangan" required value="<?=$data['transaksi']['keterangan']?>"><br><hr>
    <label for="keterangan">Operator</label>
    <select name="operator" class="form-control mb-2">
        <?php 
        foreach($data['operator'] as $operator):
            if($data['transaksi']['id_operator']==$operator['id_operator']){
                $selected='selected';
            }else{
                $selected='';
            }
        echo "<option $selected value=" . $operator['id_operator'] . ">".$operator['name_operator']."</option>";
        endforeach;   
        ?>
    </select>
    <label for="sift">Sift</label>
    <select name="sift" class="form-control mb-2">
        <?php 
        foreach($data['sift'] as $sift):
            if($data['transaksi']['id_sift']==$sift['id_sift']){
                $selected='selected';
            }else{
                $selected='';
            }
        echo "<option $selected value=" . $sift['id_sift'] . ">".$sift['name_sift']."</option>";
        endforeach;   
        ?>
    </select>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>