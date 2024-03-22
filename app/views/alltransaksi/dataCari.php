<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <?php
            if($data['transaksi']==null){
            ?>
                <h3 class="text-center">Data Transaksi Tidak Ada</h3>
                </div>
            <?php
            }else{
        ?>
            <table class="table table-bordered m-0" id="dataTable" width="120%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" class="align-middle">No</th>
                        
                        <th rowspan="2" class="align-middle">TV</th>
                        <th rowspan="2" class="align-middle">Paket</th>
                        <th colspan="5">Device</th>
                        <th colspan="3">Minuman</th>
                        <th rowspan="2" class="align-middle">Total</th>
                        <th rowspan="2" class="align-middle">Bayar</th>
                        <th rowspan="2" class="align-middle">Ket</th>
                        <th rowspan="2" class="align-middle">Aksi</th>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <th >Mulai</th>
                        <th >Selesai</th>
                        <th >Tambah</th>
                        <th >Harga</th>
                        
                        <th>3K</th>
                        <th>4K</th>
                        <th>Harga</th>
                        
                    </tr>
                </thead>
                <tbody class="text-center ">
                    <?php $i=1;
                    foreach($data['transaksi'] as $data): ?>
                    <tr>
                        <td  class="align-middle"><?= $i++; ?></td>
                        
                        <td class="align-middle"><?= $data['no_tv']; ?></td>
                        <td class="align-middle"><?= $data['paket']; ?></td>
                        <td class="align-middle"><?= $data['name_device']; ?></td>
                        <td class="align-middle"><?= $data['jam_mulai']; ?></td>
                        <td class="align-middle"><?= $data['jam_selesai']; ?></td>
                        <td class="align-middle"><?= $data['tambah_waktu']; ?></td>
                        <td class="align-middle"><?= $data['harga_device']; ?></td>
                        <td class="align-middle"><?= $data['minuman_3k']; ?></td>
                        <td class="align-middle"><?= $data['minuman_4k']; ?></td>
                        <td class="align-middle"><?= $data['harga_minum']; ?></td>
                        <td class="align-middle"><?= $data['total']; ?></td>
                        <td class="align-middle"><?= $data['bayar']; ?></td>
                        <td class="align-middle"><?= $data['keterangan']; ?></td>
                        
                        <td>
                        
                        <!-- tambah jam dan minum -->
                        <a href="#" class="view_jam btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal" data-id="<?= $data['id_transaksi'];?>">Tambah</a>

                        <!-- update -->
                        <a href="#" class="view_data btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $data['id_transaksi'];?>">Edit</a>

                        <!-- hapus -->
                        <a href="<?= BASEURL; ?>/alltransaksi/delete/<?= $data['id_transaksi']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Apakah yakin ingin menghapus data?")'>Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                

                
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<!-- tambah jam -->

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menit & Minuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" id="datatransaksi">

    
      </div>
    </div>
  </div>
</div>

<script>
    $('.view_jam').on('click', function(){
        const id_transaksi = $(this).data('id');
        $.ajax({
            url:'http://localhost/latihan/alltransaksi/gettransaksi',
            method:'post',
            data:{id_transaksi:id_transaksi},
            success:function(data){
               $('#datatransaksi').html(data);
               $('#tambahModal').modal('show'); 
            }
        })
    })
</script>   

<!-- update -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Data Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">x</button>
            </div>
            <div class="modal-body" id="updatetransaksi">

            </div>
        </div>
    </div>

</div>

<!-- update device jquery -->
<script>
    $('.view_data').on('click', function(){
        const id_transaksi = $(this).data('id');
        $.ajax({
            url:'http://localhost/latihan/alltransaksi/gettransaksiupdate',
            method:'post',
            data:{id_transaksi:id_transaksi},
            success:function(data){
               $('#updatetransaksi').html(data);
               $('#myModal').modal('show'); 
            }
        })
    })
</script>
<?php
            }
?>
        