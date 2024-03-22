



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2024</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Apakah yakin ingin keluar?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Pilih "Logout" untuk keluar.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="<?= BASEURL;?>/logout">Logout</a>
</div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL;?>/public/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL;?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL;?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL;?>/public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL;?>/public/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL;?>/public/js/demo/chart-area-demo.js"></script>
<script src="<?= BASEURL;?>/public/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL;?>/public/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
            $('#dataTable').DataTable({
            searching: false, // Menghilangkan fitur pencarian
            ordering: false,
            columnDefs: [{
                ordering: false,
                orderable: false, // Nonaktifkan sorting
                targets: 0 // Kolom pertama (indeks 0)
            }]
        });
    });

</script>
<script src="<?= BASEURL;?>/public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL;?>/public/js/demo/datatables-demo.js"></script>
<script src="<?= BASEURL;?>/public/js/bootstrap.min.js"></script>
<script src="<?= BASEURL;?>/public/js/popper.min.js"></script>

</body>

</html>