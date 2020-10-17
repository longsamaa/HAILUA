<?php
    require_once "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
   if(isset($_GET['id'])){
       $id = $_GET['id'];
       $db = mysqli_connect("localhost","root","","hailua.com");
       mysqli_set_charset($db,"utf8");
       $query1 = "INSERT INTO taikhoankhoa(idtaikhoankhoa) VALUES ('$id')";
       $rs1 = mysqli_query($db,$query1);
       kt_query($rs1,$query1,$db);
       header('location:quanlytaikhoan.php');
   }
?>