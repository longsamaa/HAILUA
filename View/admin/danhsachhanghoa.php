<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Xin chào đến với trang danh sách sản phẩm <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="row">
            <table class = "table table-hover">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Mã id admin</th>
                        <th>Mã id người dùng</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Ảnh minh họa</th>
                        <th>Xóa</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $hanghoa = Loadhanghoa();
                    while ($rshanghoa = mysqli_fetch_array($hanghoa,MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $rshanghoa['id']; ?></td>
                    <td><?php echo $rshanghoa['idadminh'];?></td>
                    <td><?php echo $rshanghoa['idnguoidung'];?></td>
                    <td><?php echo $rshanghoa['tensanpham']; ?></td>
                    <td><?php echo $rshanghoa['giasanpham'];?></td>
                    <td><img src="<?php echo $rshanghoa['anhminhhoa'];?>" class="img-thumbnail" width="50px" height="50px"></td>
                    <td><a onclick="return confirm('Bạn có muốn xóa không ?');" href="admin_delete.php?id=<?php echo $rshanghoa['id']; ?>" ><img src="../hinhanhweb/iconxoa.png" class="img-thumbnail" width="30px" height="30px"></a></td>
                    <td><a onclick="return confirm('Bạn có muốn sửa không ?');" href="admin_edit.php?id=<?php echo $rshanghoa['id']?>" ><img src="../hinhanhweb/iconedit.png" class="img-thumbnail" width="30px" height="30px"/></a></td>
                </tr>
                <?php } ?>
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
