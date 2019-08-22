<?php
class Default_Models_Donhang extends Libs_Model{
    public $donhang_id;
    public $dongho_id;
    public $khachhang_id;
    public $soLuong;
    public $thanhTien;
    private $con = null;
    //....
    
    public function __construct($db) {
        $this->con =$db;
    }
    
    public function getAllDonHang(){
        $query = "SELECT * FROM donhang";
        $stmt = $this->con->prepare($query);
        $stmt->execute();//Trả về mảng
        $rowCount = $stmt->rowCount();
        if ($rowCount>0) {
            return $stmt;
        }else{
            return null;
        }
    }

    public function getDonHangByKhachHangId(){
        $query = "SELECT * FROM donhang WHERE khachhang_id=?";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1,htmlspecialchars(strip_tags($this->khachhang_id)));
        $stmt->execute();//Trả về mảng
        $rowCount = $stmt->rowCount();
        if ($rowCount>0) {
            return $stmt;
        }else{
            return null;
        }
    }

    public function addDonHang(){
        $query = "INSERT INTO donhang SET dongho_id=:dongho_id, khachhang_id=:khachhang_id,soLuong=:soLuong,thanhTien=:thanhTien";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu
        $this->dongho_id = htmlspecialchars(strip_tags($this->dongho_id));
        $this->khachhang_id = htmlspecialchars(strip_tags($this->khachhang_id));
        $this->soLuong = htmlspecialchars(strip_tags($this->soLuong));
        $this->thanhTien = htmlspecialchars(strip_tags($this->thanhTien));

        //Tiến hành bind các giá trị cho truy vấn
        $stmt->bindParam(":dongho_id",$this->dongho_id);
        $stmt->bindParam(":khachhang_id", $this->khachhang_id); 
        $stmt->bindParam(":soLuong", $this->soLuong);   
        $stmt->bindParam(":thanhTien", $this->thanhTien);       
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}
