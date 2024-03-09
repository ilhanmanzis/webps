
<!-- button triger -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>

<!-- flash notifikasi -->
<?php
Flasher::flash();
?>
<!-- button triger -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Operator</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach($data['operator'] as $data): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['name_operator']; ?></td>
                        <td>
                        
                        <a href="<?= BASEURL; ?>/operator/delete/<?= $data['id_operator']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Apakah yakin ingin menghapus data?")'>Hapus</a>

                        <a href="#" class="view_data btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $data['id_operator'];?>">Edit</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">x</button>
            </div>
            <div class="modal-body" id="dataoperator">

            </div>
        </div>
    </div>

</div>
<!-- update device jquery -->
<script>
    $('.view_data').on('click', function(){
        const id_operator = $(this).data('id');
        $.ajax({
            url:'http://localhost/latihan/operator/getoperator',
            method:'post',
            data:{id_operator:id_operator},
            success:function(data){
               $('#dataoperator').html(data);
               $('#myModal').modal('show'); 
            }
        })
    })
</script>