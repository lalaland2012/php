<?php 
class Default_Models_KhachHang extends Libs_Model{
	public $khachhang_id;
	public $email;
	public $password;
	public $ten;
	public $soDienThoai;
	public $diaChi;

	private $con = null;
	public function __construct($db){
		$this->con = $db;
	}

	// Return TRUE|FALSE
    public function checkKhachHang(){
        $query = "SELECT * FROM khachhang WHERE email=:email AND password=:password";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu
        $this->password = htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->execute();
        $numRow = $stmt->rowCount();
        if ($numRow>=1) {
            foreach ($stmt->fetchAll() as $k => $v){
                if($v['email'] == $this->email){
                    $_SESSION['khachhang_id'] = $v['khachhang_id'];
                }
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }  

    public function addKhachHang(){
        $query = "INSERT INTO khachhang SET email=:email, password=:password, ten=:ten";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu
        $this->ten = htmlspecialchars(strip_tags($this->ten));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        //Tiến hành bind các giá trị cho truy vấn
        $stmt->bindParam(":ten",$this->ten);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getKhachHangByInfo(){
        // Lấy ra 1 lq  
        $query = "SELECT * FROM khachhang WHERE email=:email LIMIT 0,1"; 
        $stmt = $this->con->prepare($query);        
        $stmt->bindParam(":email", $this->email);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }     

    public function updateProfileKhachHang(){
        // Lấy ra 1 lq  
        $query = "UPDATE khachhang SET ten=:ten, soDienThoai=:soDienThoai, diaChi=:diaChi WHERE email=:email"; 
        $stmt = $this->con->prepare($query);        

        $this->ten = htmlspecialchars(strip_tags($this->ten));
        $this->soDienThoai = htmlspecialchars(strip_tags($this->soDienThoai));
        $this->diaChi = htmlspecialchars(strip_tags($this->diaChi));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":ten",$this->ten);
        $stmt->bindParam(":soDienThoai",$this->soDienThoai);
        $stmt->bindParam(":diaChi",$this->diaChi);
        $stmt->bindParam(":email",$this->email);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }      
    }  

    public function updateKhachHang()
    {
        $query = "UPDATE khachhang SET gopY=:gopY WHERE email=:email";
        $stmt = $this->con->prepare($query);

        //Làm sạch dữ liệu
        $this->gopY = htmlspecialchars(strip_tags($this->gopY));
        $this->email = htmlspecialchars(strip_tags($this->email));


        //Tiến hành bind các giá trị cho truy vấn   
        $stmt->bindParam(":gopY", $this->gopY);
        $stmt->bindParam(":email",$this->email);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }        
    }
    
}
?>