<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $loaisanpham = loadLoaisanphamID($id);
        }
    ?>

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Sửa loại sản phẩm nào <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <?php
        if(isset($_POST['themmoi'])){
            if(empty($_POST['loaisanpham'])){
                echo "<p style='color: red'> Bạn chưa nhập thông tin </p>";
            }else{
                $loaisanpham = $_POST['loaisanpham'];
                $db = mysqli_connect("localhost","root","","hailua.com");
                mysqli_set_charset($db,"utf8");
                $query1 = "UPDATE loaisanpham SET loaisanpham = '$loaisanpham' WHERE id = '$id'";
                $rs1 = mysqli_query($db,$query1);
                kt_query($rs1,$query1,$db);
                echo "<p style='color: #005cbf'>Thêm mới thành công</p>";
                header('location:danhsachloaisanpham.php');
            }
        }
        ?>
        <div class="mx-auto">
            <form method="post">
                <label><b>Chỉnh sửa loại sản phẩm</b></label>
                <input type="text" name = "loaisanpham" class="form-control" placeholder="Loại sản phẩm" value="<?php echo $loaisanpham['loaisanpham']; ?>"/>
                <?php echo "</br>" ?>
                <input type="submit" name="themmoi" value="Chỉnh sửa" style="color: #005cbf"/>
            </form>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © By Boobstrap 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->