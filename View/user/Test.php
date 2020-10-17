<?php
    $sql = mysqli_connect("localhost","root","","hailua.com");
    mysqli_set_charset($sql,"utf8");
    $query = "SELECT * FROM soluongsanphamgiaodich WHERE idsanpham = 2";
    $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
    $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(empty($rs['id'])){
        echo 0;
    }
    else{
        echo $rs['soluongsanpham'];
    }
?>