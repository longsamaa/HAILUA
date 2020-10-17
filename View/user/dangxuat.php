<?php
//Nhận cookie
@ob_start();
session_start();
?>

<?php
    unset($_SESSION['taikhoannguoidung']);
    unset($_SESSION['matkhaunguoidung']);
    header('location:indexuser.php');
?>
