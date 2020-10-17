<?php
    //Lớp người dùng
    class User{
        public $id;
        public $taikhoan;
        public $matkhau;
        public $hoten;

        //function set

        public function setID($id){
            $this->id = $id;
        }
        public function settaikhoan($taikhoan){
            $this->taikhoan = $taikhoan;
        }
        public function setmatkhau($matkhau){
            $this->matkhau = $matkhau;
        }
        public function sethoten($hoten){
            $this->hoten = $hoten;
        }

        //function get

        public function getID(){
            return $this->id;
        }
        public function gettaikhoan(){
            return $this->taikhoan;
        }
        public function getmatkhau(){
            return $this->matkhau;
        }
        public function gethoten(){
            return $this->hoten;
        }
    }
    //Lớp admin
    class Admin extends User{

    }

    //Người dùng
    class Nguoidung extends User{
        public $sodt;
        //set
        public function setsodt($sodt){
            $this->sodt = $sodt;
        }
        //get
        public function getsodt(){
            return $this->sodt;
        }
    }

    //Lớp hàng hóa
    class hanghoa{
        public $id;
        public $idadmin;
        public $idnguoidung;
        public $idloaisanpham;
        public $giasanpham;
        public $tensanpham;
        public $anhminhhoa;
        //function set
        public function setID($id){
            $this->id = $id;
        }
        public function setidadmin($idadmin){
            $this->idadmin = $idadmin;
        }
        public function setidnguoidung($idnguoidung){
            $this->idnguoidung = $idnguoidung;
        }
        public function setidloaisanpham($idloaisanpham){
            $this->idloaisanpham = $idloaisanpham;
        }
        public function setgiasanpham($giasanpham){
            $this->giasanpham = $giasanpham;
        }
        public function settensanpham($tensanpham){
            $this->tensanpham = $tensanpham;
        }
        public function setanhminhhoa($anhminhhoa){
            $this->anhminhhoa = $anhminhhoa;
        }
        //function get
        public function getID(){
            return $this->id;
        }
        public function getidadmin(){
            return $this->idadmin;
        }
        public function getidnguoidung(){
            return $this->idnguoidung;
        }
        public function getidsanpham(){
            return $this->idloaisanpham;
        }
        public function getgiasanpham(){
            return $this->giasanpham;
        }
        public function gettensanpham(){
            return $this->tensanpham;
        }
        public function getanhminhhoa(){
            return $this->anhminhhoa;
        }
    }
?>