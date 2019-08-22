<?php  
    if (!isset($_SESSION['emailAdmin'])) {
        ?>
        <script>
            window.location = "<?php echo URL_BASE;?>admin/login";
        </script>
    <?php
    }else{
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">   
        <h2 class="page-header">Danh sách đơn hàng khách hàng đặt mua</h2>
        <div class="row">
            <div class="col-md-10 col-xs-9">
                <div class="row">
                    <div class="col-md-9 col-xs-7" style="padding-right: 0px">
                        <input class="form-control" id="txtSearch" type="search" placeholder="Nhập tên đồng hồ cần tìm kiếm">
                    </div>
                    <div class="col-md-3 col-xs-5" style="padding-left: 0">
                        <button class="btn btn-sm btn-danger" onclick="showData()">Tìm kiếm</button>
                    </div>
                </div>                
            </div>
        </div>
        <br>
        <table id="result" class="table table-bordered table-responsive table-hover text-center">
            <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Tên KH</th>
                <th class="text-center">Tên ĐH</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Thành tiền</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Xóa đơn hàng</th>
            </thead>
            <?php  
            while ($row = $this->objDonHang->fetch(PDO::FETCH_ASSOC)) {
                extract($row);                       
            ?>
            <tr>
                <td><?php echo $donhang_id;?></td>
                <td>
                    <?php  
                    $database = new Libs_Model();
                    $db = $database->getConnection();
                    $khachhang = new Admin_Models_Khachhang($db);
                    $khachhang->khachhang_id = $khachhang_id;
                    $RowKH = $khachhang->getKhachHangById();
                    ?>
                    <?php echo $RowKH['ten']; ?>
                </td>
                <td>
                    <?php  
                    $database = new Libs_Model();
                    $db = $database->getConnection();
                    $dongho = new Admin_Models_Dongho($db);
                    $dongho->dongho_id = $dongho_id;
                    $RowDH = $dongho->getDongHoById();
                    ?>
                    <?php echo $RowDH['ten']; ?>
                </td>                
                <td><?php echo $soLuong;?></td>
                <td><?php echo $thanhTien;?></td>
                <td>
                    <?php  
                    if($trangThai == "" || $trangThai == "Chưa giao"){
                    ?>
                    <a href="<?php echo URL_BASE;?>admin/trangThaiDonHang?id=<?php echo $donhang_id;?>" class="btn btn-xs btn-default">Chưa giao</a>
                    <?php }else{echo $trangThai;} ?></td>
                <td>
                    <?php  
                    echo "<a href='#' onclick='delete_donhang($donhang_id);' class='btn btn-xs btn-danger'>Xoá</a>";
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    <script>
        function delete_donhang(id) {
            var response = confirm("Bạn có chắc muốn xoá đơn hàng này khi đã giao hàng xong?");
            if (response==true) {
                window.location = "<?php echo URL_BASE;?>admin/deleteDonHang?id="+id;
            }
        }
    </script>
</div>  <!--/.main-->
<?php } ?>