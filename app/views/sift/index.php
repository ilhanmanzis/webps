
<!-- button triger -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>

<!-- flash notifikasi -->
<?php
Flasher::flash();
?>
<!-- button triger -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Sift</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach($data['sift'] as $data): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['name_sift']; ?></td>
                        <td>
                        
                        <a href="<?= BASEURL; ?>/sift/delete/<?= $data['id_sift']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Apakah yakin ingin menghapus data?")'>Hapus</a>

                        <a href="#" class="view_data btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $data['id_sift'];?>">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- create -->
<?php include 'create.php'; ?>


<!-- update -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Sift</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">x</button>
            </div>
            <div class="modal-body" id="datasift">

            </div>
        </div>
    </div>

</div>
<!-- update device jquery -->
<script>
    $('.view_data').on('click', function(){
        const id_sift = $(this).data('id');
        $.ajax({
            url:'http://localhost/latihan/sift/getsift',
            method:'post',
            data:{id_sift:id_sift},
            success:function(data){
               $('#datasift').html(data);
               $('#myModal').modal('show'); 
            }
        })
    })
</script>