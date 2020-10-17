<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Chỉnh sửa ảnh slide <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <?php
            if(isset($_POST['sua'])){
                if(($_FILES['img']['type'] != "image/gif"
                    && $_FILES['img']['type'] != "image/jpg"
                    && $_FILES['img']['type'] != "image/jpeg"
                    && $_FILES['img']['type'] != "image/png")
                    && ($_FILES['img2']['type'] != "image/gif" && $_FILES['img2']['type'] != "image/gif" && $_FILES['img2']['type'] != "image/gif" && $_FILES['img2']['type'] != "image/gif")
                    && ($_FILES['img3']['type'] != "image/gif" && $_FILES['img3']['type'] != "image/gif" && $_FILES['img3']['type'] != "image/gif" && $_FILES['img3']['type'] != "image/gif")){
                        echo "<p style='color: red'>Bạn nhập sai định dạng file</p>";
                }
                else{
                    $image1 = $_FILES['img']['name'];
                    $link_img1 = '../Uploadhinhanh/'.$image1;
                    move_uploaded_file($_FILES['img']['tmp_name'],"../Uploadhinhanh/".$image1);
                    $image2 = $_FILES['img2']['name'];
                    $link_img2 = '../Uploadhinhanh/'.$image2;
                    move_uploaded_file($_FILES['img2']['tmp_name'],"../Uploadhinhanh/".$image2);
                    $image3 = $_FILES['img3']['name'];
                    $link_img3 = '../Uploadhinhanh/'.$image3;
                    move_uploaded_file($_FILES['img3']['tmp_name'],"../Uploadhinhanh/".$image3);

                    $db = mysqli_connect("localhost","root","","hailua.com");
                    mysqli_set_charset($db,"utf8");

                    $query1 = "UPDATE hinhanhslide SET hinhanh = '$link_img1' WHERE id = '1'";
                    $rs1 = mysqli_query($db,$query1);
                    $query2 = "UPDATE hinhanhslide SET hinhanh = '$link_img2' WHERE id = '2'";
                    $rs2 = mysqli_query($db,$query2);
                    $query3 = "UPDATE hinhanhslide SET hinhanh = '$link_img3' WHERE id = '3'";
                    $rs3 = mysqli_query($db,$query3);
                    kt_query($rs1,$query1,$db);
                    kt_query($rs2,$query2,$db);
                    kt_query($rs3,$query3,$db);
                    header('location:index.php');
                }
            }
        ?>
        <div class="mx-auto">
            <form method="post" enctype="multipart/form-data" name = "frchinhsuaslide">
            <div class="form-group">
                <label>Hình ảnh slide 1</label>
                <input type="file" name="img" value="" class="custom-file">
                <?php echo "</br>" ?>
                <label>Hình ảnh slide 2</label>
                <input type="file" name = "img2" value="" class="custom-file">
                <?php echo "</br>" ?>
                <label>Hình ảnh slide 3</label>
                <input type="file" name="img3" value="" class="custom-file">
                <?php echo "</br>" ?>
                <input type="submit" name="sua" value="Cập nhật" style="color: #005cbf" ">
            </div>
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