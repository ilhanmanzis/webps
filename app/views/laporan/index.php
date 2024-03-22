<?php
Flasher::flash();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="mt-1 font-weight-bold text-primary">Cetak Laporan Transaksi</h6>
        <form action="<?=BASEURL?>/laporan/cetaksemualaporan" method="post" target="blank">
            <button type="submit" name="cetak" class="btn btn-sm btn-success">Cetak Semua Laporan</button>
        </form>
    </div>
    <div class="card-body">
        <form action="<?=BASEURL;?>/laporan/cetaklaporan" method="post" target="blank">
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="date" name="awal" id="tanggal-awal" class="form-control mb-2">
            </div>
            <div class="col-sm-1">
                Sampai
            </div>
            <div class="col-sm-3">
                <input type="date" name="akhir" class="form-control mb-2" id="tanggal-akhir">
            </div>


            <!-- untuk set value data hari ini -->
            <script>
                // Ambil elemen input tanggal
                var inputTanggalAwal = document.getElementById('tanggal-awal');
                var inputTanggalAkhir = document.getElementById('tanggal-akhir');

                // Buat objek tanggal hari ini
                var today = new Date();

                // Format tanggal menjadi YYYY-MM-DD
                var formattedDate = today.toISOString().substr(0, 10);

                // Set nilai input tanggal menjadi tanggal hari ini
                inputTanggalAwal.value = formattedDate;
                inputTanggalAkhir.value = formattedDate;
            </script>



            <div class="col-sm-2">
                <select name="operator" class="form-control mb-2">
                    <?php 
                    foreach($data['operator'] as $operator):
                        if($data['operatorSession']['id_operator']==$operator['id_operator']){
                            $selected='selected';
                        }else{
                            $selected='';
                        }
                    echo "<option $selected value=" . $operator['id_operator'] . ">".$operator['name_operator']."</option>";
                    endforeach;   
                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="sift" class="form-control mb-2">
                    <?php 
                    foreach($data['sift'] as $sift):
                        if($data['siftSession']['id_sift']==$sift['id_sift']){
                            $selected='selected';
                        }else{
                            $selected='';
                        }
                    echo "<option $selected value=" . $sift['id_sift'] . ">".$sift['name_sift']."</option>";
                    endforeach;   
                    ?>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="submit" name="lihat" class="btn btn-primary">Cetak</button>
            </div>
        </div>
        </form>
    </div>
</div>


