<?php  
    //Hàm khởi động SESSION (Do websever sinh ra)
    session_start();
?>
<?php          
    if (!isset($_SESSION['email'])) {
        ?>
        <script>
        	confirm("Để gửi góp ý đến Admin xin quý khách vui lòng đăng nhập hoặc đăng ký khi chưa có tài khoản. Xin cảm ơn!");
            window.location = "<?php echo URL_BASE;?>";
        </script>
    <?php
    }else{
        $database = new Libs_Model();
        $db = $database->getConnection(); 
        $objKhachHang = new Default_Models_KhachHang($db);
        $objKhachHang->email = $_SESSION['email'];
        $khachHang = $objKhachHang->getKhachHangByInfo();
        ?>
	<content class="soSanhWatch container-fluid">
		<div class="container" id="result2" style="margin-top: 90px;">
			<div class="row">
				<div class="col-md-12 col-xs-12">					
					<div class="p-watch1">
						<a href="#"><p class="left-post">THÔNG TIN LIÊN HỆ</p></a>
					</div>
					<div class="row">
						<div class="col-md-8">
							<iframe src="https://www.google.com/maps/d/embed?mid=1uwr4M-Lsplj4sj7BWQbBDWdDiEDHTo7F" width="100%" height="300px"></iframe>
						</div>
						<div class="col-md-4">
							<p><b>Địa chỉ:</b> KĐT Trung Hòa Nhân Chính, Nguyễn Thị Thập, P. Trung Hòa, Q. Cầu Giấy, Tp. Hà Nội</p>
							<p><b>Nhóm 02:</b> Bán đồng hồ</p>
							<p><b>SĐT liên hệ:</b> 0961.191.464</p>
						</div>
					</div>									
				</div>
			</div>
		</div>
	</content>
<?php } ?>