<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Danh sách loại sản phẩm <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã loại sản phẩm</th>
                        <th>Tên loại sản phẩm</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $rs = loadLoaisanpham();
                        while ($loaisanpham = mysqli_fetch_array($rs,MYSQLI_ASSOC)) {
                            ?>
                            <tr>
                                <td><?php echo $loaisanpham['id'];?></td>
                                <td><?php echo $loaisanpham['loaisanpham'];?></td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn sửa không ?');" href="admin_editloaisanpham.php?id=<?php echo $loaisanpham['id']; ?>" ><img src="../hinhanhweb/iconedit.png" width="30px" height="30px" class="img-thumbnail"></a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
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