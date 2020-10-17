<?php
    session_start();
   $idsanpham = $_POST['id'];
   if(isset($_SESSION['cart'][$idsanpham]))
   {
       $qty = $_SESSION['cart'][$idsanpham] + 1;
   }
   else
   {
       $qty = 1;
   }
   $_SESSION['cart'][$idsanpham] = $qty;
?>