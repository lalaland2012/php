<?php  
class Admin_Controllers_Index extends Libs_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->view->render("index/index");
	}
	
	public function login(){
		$this->view->render("login");
	}
	public function logout(){
		$this->view->render("logout");
	}
	public function dongho(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$dongho = new Admin_Models_Dongho($db);
		$this->view->objDongHo = $dongho->getAllDongHo();
		$this->view->render("index/dongho");
	}	
	public function detail(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$dongho = new Admin_Models_Dongho($db);
		$dongho->dongho_id = isset($_GET['id']) ? $_GET['id'] : "";
        $thuonghieu = new Admin_Models_ThuongHieu($db);
        $thuonghieu->thuonghieu_id = isset($_GET['th']) ? $_GET['th'] : "";
        $this->view->result = $dongho->getDongHoById();
        $this->view->result1 = $thuonghieu->getThuongHieuById();
		$this->view->render("dongho/detail");
	}
	public function add(){
		$this->view->render("dongho/add");
	}
	public function update(){
		$this->view->render("dongho/update");
	}
	public function delete(){
		$this->view->render("dongho/delete");
	}

	public function donhang(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$donhang = new Admin_Models_Donhang($db);
		$this->view->objDonHang = $donhang->getAllDonHang();
		$this->view->render("index/donhang");
	}
	public function deleteDonHang(){
		$this->view->render("donhang/deleteDonHang");
	}
	public function trangThaiDonHang(){
		$this->view->render("donhang/trangThaiDonHang");
	}

	public function khachhang(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$khachhang = new Admin_Models_Khachhang($db);
		$this->view->objKhachHang = $khachhang->getAllKhachHang();
		$this->view->render("index/khachhang");
	}
	public function gopYKH(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$khachhang = new Admin_Models_Khachhang($db);
		$khachhang->khachhang_id = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->result = $khachhang->getKhachHangById();
		$this->view->render("khachhang/gopYKH");
	}
	public function addKH(){
		$this->view->render("khachhang/addKH");
	}
	public function updateKH(){
		$this->view->render("khachhang/updateKH");
	}
	public function deleteKH(){
		$this->view->render("khachhang/deleteKH");
	}

	public function thuonghieu(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$thuonghieu = new Admin_Models_ThuongHieu($db);
		$this->view->objThuongHieu = $thuonghieu->getAllThuongHieu();
		$this->view->render("index/thuonghieu");
	}
	public function slide(){
		$database = new Libs_Model();
		$db = $database->getConnection();
		$slide = new Admin_Models_Slide($db);
		$this->view->objSlide = $slide->getAllSlide();
		$this->view->render("index/slide");
	}

	

	public function search(){
	    $ten = isset($_REQUEST['ten']) ? $_REQUEST['ten'] : "";
		    if ($ten != "") {
		        $con = new PDO("mysql:host=localhost;dbname=watch;charset=UTF8","root","");
		        $query = "SELECT * FROM dongho WHERE ten LIKE '%".$ten."%'";
		        $stmt = $con->prepare($query);
		        $stmt->execute();
		        //Biểu diễn dữ liệu
		    }
		?>
		 
		<table class="table table-bordered table-responsive table-hover text-center">
		    <thead>
		        <th class="text-center">ID</th>
		        <th class="text-center">Tên</th>
		        <th class="text-center">Xuất xứ</th>
		        <th class="text-center">Thương hiệu</th>
		        <th class="text-center">Dây</th>
		        <th class="text-center">Giá cũ</th>
		        <th class="text-center">Giá mới</th>
		        <th class="text-center">Bảo hành</th>
		        <th class="text-center">Chức năng</th>
		    </thead>
		    <?php  
		    while ($dongho = $stmt->fetch(PDO::FETCH_ASSOC)) {      
		    $idD=$dongho['dongho_id'];              
		    ?>
		    <tr>
		        <td><?php echo $dongho['dongho_id'];?></td>
		        <td><?php echo $dongho['ten'];?></td>
		        <td><?php echo $dongho['xuatXu'];?></td>
		        <td>
		            <?php         
		                $database = new Libs_Model();
		                $db = $database->getConnection();               
		                $thuonghieu = new Admin_Models_ThuongHieu($db);
		                $thuonghieu->thuonghieu_id = $dongho['thuonghieu_id'];
		                //Lấy tất cả dữ liệu từ bảng 'categories'
		                $data = $thuonghieu->getThuongHieuById();
		                echo $data['ten'];
		            ?> 
		        </td>
		        <td><?php echo $dongho['day'];?></td>
		        <td><?php echo $dongho['giaCu'];?></td>
		        <td><?php echo $dongho['giaMoi'];?></td>
		        <td><?php echo $dongho['baoHanh'];?></td>
		        <td>
		            <a href="<?php echo URL_BASE;?>admin/detail?id=<?php echo $dongho['dongho_id'];?>&th=<?php echo $dongho['thuonghieu_id'];?>" class="btn btn-xs  btn-info">Xem</a>
		            <a href="<?php echo URL_BASE;?>admin/update?id=<?php echo $dongho['dongho_id'];?>" class="btn btn-xs  btn-primary">Sửa</a>
		            <?php  
		            $idD = $dongho['dongho_id'];
		            echo "<a href='#' onclick='delete_dongho($idD)' class='btn btn-xs btn-danger'>Xoá</a>";
		            ?>
		        </td>
		    </tr>
		    <?php } ?>
		</table>
		<script>
		function delete_dongho(id) {
		    var response = confirm("Bạn có chắc muốn xoá SP?");
		    if (response==true) {
		        window.location = "<?php echo URL_BASE;?>admin/delete?id="+id;
		    }
		}
		</script>

	<?php 
	} 
	
	
}
?>