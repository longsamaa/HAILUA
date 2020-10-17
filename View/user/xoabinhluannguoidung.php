<?php
    require_once "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
    $sql = mysqli_connect("localhost","root","","hailua.com");
    mysqli_set_charset($sql,"utf8");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $binhluan = loadbinhluanIDbinhluan($id);
        $rsbl = mysqli_fetch_array($binhluan,MYSQLI_ASSOC);
        $idsanpham = $rsbl['idsanpham'];
        $trang = "location:trangchitietsanpham.php?id=";
        $loadlai = $trang.$idsanpham;
        $query = "DELETE FROM binhluan WHERE id = {$id}";
        $result = mysqli_query($sql,$query);
        kt_query($result,$query,$sql);
        header($loadlai);
    }
?>