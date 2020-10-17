<?php
    function loadDBUSERNAME($taikhoan,$matkhau){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM taikhoanadmin WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
        $result = mysqli_query($sql,$query) or die("QUERY {$query} \m<br/> MYSQL erorr:".mysqli_error($sql));
        return $result;
    }
    function setClassAdmin($taikhoan,$matkhau){
        require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        if(empty($taikhoan) && empty($matkhau)){
            echo "Khong load duoc du lieu";
        }
        else{
            $query = "SELECT * FROM taikhoanadmin WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
            $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
            $admin = new Admin();
            $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $admin->setID($rs['id']);
            $admin->settaikhoan($rs['taikhoan']);
            $admin->setmatkhau($rs["matkhau"]);
            $admin->sethoten($rs['hoten']);
            return $admin;
        }
    }
    function loadLoaisanpham(){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM loaisanpham";
        $result = mysqli_query($sql,$query) or die("QUERY {$query} \m<br/> MYSQL erorr:".mysqli_error($sql));
        return $result;
    }
    function Loadhanghoa(){
        require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function kt_query($result,$query,$dbc){
        if(!$result){
            die("Query {$query} \n<br/> MY SQL ERROR:" .mysqli_error($dbc));
        }
    }
    function setClasshanghoa($id){
        require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE id = {$id}";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $hanghoa = new hanghoa();
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $hanghoa->setID($rs['id']);
        $hanghoa->setidadmin($rs['idadminh']);
        $hanghoa->setidnguoidung($rs['idnguoidung']);
        $hanghoa->setidloaisanpham($rs['idloaisanpham']);
        $hanghoa->setgiasanpham($rs['giasanpham']);
        $hanghoa->settensanpham($rs['tensanpham']);
        $hanghoa->setanhminhhoa($rs['anhminhhoa']);
        return $hanghoa;
    }
    function loadLoaisanphamID($id){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM loaisanpham WHERE id = {$id}";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $rs;
    }
    function loadImageslide($id){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hinhanhslide WHERE id = '$id'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $rs;
    }
    function LoadhanghoaIDloaisanpham($idloaisanpham){
        require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idloaisanpham = '$idloaisanpham'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadtaikhoannguoidung(){
        require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM nguoidung";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadtaikhoannguoidungUsername($taikhoan,$matkhau){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM nguoidung WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
        $result = mysqli_query($sql,$query) or die("QUERY {$query} \m<br/> MYSQL erorr:".mysqli_error($sql));
        return $result;
    }

function setClassnguoidung($taikhoan,$matkhau){
    require_once "C:/xampp/htdocs/Hailua/Model/classUser.php";
    $sql = mysqli_connect("localhost","root","","hailua.com");
    mysqli_set_charset($sql,"utf8");
    if(empty($taikhoan) && empty($matkhau)){
        echo "Khong load duoc du lieu";
    }
    else{
        $query = "SELECT * FROM nguoidung WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $nguoidung = new Nguoidung();
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $nguoidung->setID($rs['id']);
        $nguoidung->settaikhoan($rs['taikhoan']);
        $nguoidung->setmatkhau($rs['matkhau']);
        $nguoidung->sethoten($rs['hoten']);
        $nguoidung->setsodt($rs['sodienthoai']);
        return $nguoidung;
    }

}
    function loadhanghoaID($id){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE id = '$id'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $rs;
    }
    function loadtaikhoannguoidungID($id){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM nguoidung WHERE id = '$id'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $rs;
    }
    function loadHanghoaidnguoidung($idnguoidung){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idnguoidung = '$idnguoidung'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadhanghoangoaitru($idnguoidung){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idnguoidung != '$idnguoidung'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadhanghoadidngoaitru($id,$idnguoidung){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idnguoidung != '$idnguoidung' AND idloaisanpham = '$id'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadhoadonIDnguoidung($idnguoidung){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hoadon WHERE idnguoidung = '$idnguoidung'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadhoadonAdmin(){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hoadon WHERE idnguoidung = 0";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadtatcahoadonadmin(){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hoadon WHERE idnguoidung = 0";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadtatcahoadonnguoidung(){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hoadon WHERE idadmin = 0";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadtaikhoankhoaID($id){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM taikhoankhoa WHERE idtaikhoankhoa = '$id'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadbinhluanid($idsanpham){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM binhluan WHERE idsanpham = '$idsanpham'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadbinhluanIDbinhluan($idbinhluan){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM binhluan WHERE id = '$idbinhluan'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadsoluongsanphamgiaodich($idsanpham){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM soluongsanphamgiaodich WHERE idsanpham = '$idsanpham'";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(empty($rs['id'])){
            $soluong = 0;
        }
        else{
            $soluong = $rs['soluongsanpham'];
        }
        return $soluong;
    }
    function loadsoluongsanpham(){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM soluongsanphamgiaodich ORDER BY soluongsanpham DESC";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadsanphamtangdan($idsanpham){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idloaisanpham = '$idsanpham' ORDER BY giasanpham ASC";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
    function loadsanphamgiamdan($idsanpham){
        $sql = mysqli_connect("localhost","root","","hailua.com");
        mysqli_set_charset($sql,"utf8");
        $query = "SELECT * FROM hanghoa WHERE idloaisanpham = '$idsanpham' ORDER BY giasanpham DESC ";
        $result = mysqli_query($sql, $query) or die("QUERY {$query} \m<br/> MYSQL erorr:" . mysqli_error($sql));
        return $result;
    }
?>

