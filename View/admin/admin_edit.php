<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sanpham = setClasshanghoa($id);
        }
    ?>
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Chỉnh sửa sản phầm nào <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>

        <?php
        if(isset($_POST['themmoi'])){
            if(empty($_POST['tensanpham'])){
                $error[0] = "Thiếu tên sản phẩm";
            }
            if(empty($_POST['giasanpham'])){
                $error[1] = "Thiếu giá sản phẩm";
            }
            if(empty($_POST['img'])){
                $error[3] = "Chưa có hình ảnh";
            }
            if(empty($_POST['loaisanpham'])){
                $error[2] = "Ban Chua chon loai san pham";
            }
            if(($_FILES['img']['type'] != "image/gif")
                &&($_FILES['img']['type'] != "image/jpg")
                &&($_FILES['img']['type'] != "image/jpeg")
                &&($_FILES['img']['type'] != "image/png")){
                $error[3] = "Nhập sai định dạng file";
            }
            if(isset($_POST['tensanpham']) && isset($_POST['giasanpham']) && isset($_POST['loaisanpham']) && $_FILES['img']['size'] != ""){
                $image = $_FILES['img']['name'];
                $link_img = '../Uploadhinhanh/'.$image;
                move_uploaded_file($_FILES['img']['tmp_name'],"../Uploadhinhanh/".$image);
                $tensanpham = $_POST['tensanpham'];
                $giasanpham = $_POST['giasanpham'];
                $loaisanpham = $_POST['loaisanpham'];
                $db = mysqli_connect("localhost","root","","hailua.com");
                mysqli_set_charset($db,"utf8");

                //insert san pham vao trong database
                $idadmin = $Admin->getID();
                $query1 = "UPDATE hanghoa SET 
                                              tensanpham = '$tensanpham',
                                              giasanpham = '$giasanpham',
                                              anhminhhoa = '$link_img',
                                              idloaisanpham = '$loaisanpham'
                                           WHERE id = '$id'  ";

                $result1 = mysqli_query($db,$query1);
                kt_query($result1,$query1,$db);
                header('location:danhsachhanghoa.php');
                unset($_POST);
                echo "<p style='color: #005cbf'>Chỉnh sửa thành công</p>";

            }
        }
        ?>

        <div class="mx-auto">
            <form name = "frthemsanpham" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <label><b>Tên sản phẩm</b></label>
                    <input type="text" name="tensanpham" class="form-control" placeholder="Tên sản phẩm" autofocus = "autofocus" value="<?php echo $sanpham->gettensanpham(); ?>"/>
                    <?php if(isset($error[0])){echo "<p style='color: red'>$error[0]</p>";} echo"</br>";?>
                    <label><b>Giá sản phẩm</b></label>
                    <input type="text" name="giasanpham" class="form-control" placeholder="Giá sản phẩm" value="<?php echo $sanpham->getgiasanpham(); ?>"/>
                    <?php if(isset($error[1])){echo "<p style='color: red'>$error[1]</p>";} echo"</br>";?>
                    <div class="form-group">
                        <label style="display: block"><b>Loại sản phẩm</b></label>
                        <?php
                        $result = loadLoaisanpham();
                        $dem = 0;
                        while( $rs = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                            <?php if($rs['id'] == $sanpham->getidsanpham()){
                            ?>
                            <label class="custom-radio"><input type="radio" name="loaisanpham" value=" <?php echo $rs['id']; ?>" checked = "checked"> <?php echo $rs['loaisanpham']; ?></label>
                            <?php }
                            else { ?>
                            <label class="custom-radio"><input type="radio" name="loaisanpham" value=" <?php echo $rs['id']; ?>" > <?php echo $rs['loaisanpham']; ?></label>

                            <?php }
                        }
                        ?>
                    </div>
                    <?php if(isset($error[2])){echo "<p style='color: red'>$error[2]</p>";} echo"</br>";?>
                    <div class="form-group">
                        <label><b>Ảnh minh họa</b></label>
                        <input type="file" name = "img" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name = "themmoi" value="Chỉnh sửa" style="color: #005cbf"/>
                    </div>
                </div>
            </form>
        </div>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © By Boobstrap 2018</span>
                </div>
            </div>
        </footer>

    </div>


</div>