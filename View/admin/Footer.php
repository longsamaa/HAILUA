<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<?php
    if(isset($_POST['Dangxuat'])){
        unset($_SESSION['taikhoanadmin']);
        unset($_SESSION['matkhauadmin']);
        header('location:Login.php');
    }
?>
<form method="post">
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn thoát chứ ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Ấn thoát để thoát</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" data-dismiss="modal">Hủy</button>
                    <input type="submit"  name = "Dangxuat" value="Thoát"></input>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Bootstrap core JavaScript-->
<script src="/Hailua/Public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/Hailua/Public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/Hailua/Public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="/Hailua/Public/admin/vendor/chart.js/Chart.min.js"></script>
<script src="/Hailua/Public/admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="/Hailua/Public/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="/Hailua/Public/admin/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="/Hailua/Public/admin/js/demo/datatables-demo.js"></script>
<script src="/Hailua/Public/admin/js/demo/chart-area-demo.js"></script>

</body>

</html>
