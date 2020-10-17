<?php
    require_once "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
    $sql = mysqli_connect("localhost","root","","hailua.com");
    mysqli_set_charset($sql,"utf8");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM taikhoankhoa WHERE idtaikhoankhoa = {$id}";
        $result = mysqli_query($sql,$query);
        kt_query($result,$query,$sql);
        header('location:quanlytaikhoan.php');
    }
?>