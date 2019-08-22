<content class="soSanhWatch container-fluid">
    <div class="container" id="result2" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-12 col-xs-12">                   
                <div class="p-watch1">
                    <a href="#"><p class="left-post">GIỎ HÀNG</p></a>
                </div>                                                  
            </div>
        </div>
        <?php 
            $count = count($_SESSION['cart_item']);
            if ($count>0) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <style type="text/css">
                        th{
                            text-align: center;
                        }
                    </style>
                    <tr>
                        <th class="col-md-2">Tên SP</th>
                        <th class="col-md-2">Ảnh SP</th>
                        <th class="col-md-2">Số lượng</th>
                        <th class="col-md-2">Đơn giá</th>
                        <th class="col-md-2">Thành tiền</th>
                        <th class="col-md-2">Xóa sản phẩm</th>
                    </tr>
                    <?php  
                        $total=0;
                        foreach ($_SESSION['cart_item'] as $key => $value){
                    ?>
                    <tr>
                        <td class="col-md-2"><?php echo $value['ten']; ?></td>
                        <td class="col-md-2"><img src="<?php echo URL_BASE;?><?php echo $value['anh'];?>" style="width: 40px;"></td>
                        <td class="col-md-2">                       
                            <!-- <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                      <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" style="text-align: center;">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-danger btn-number" data-type="plus" data-field="">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>   -->    
                            <form>
                                <input type="number" name="quantity" value="<?php echo $value['quantity']; ?>" min="1" style="border: 1px solid black;text-align: center; color: red"> 
                            </form>             
                        </td>
                        <td class="col-md-2"><?php echo $value['giaMoi'] ?></td>
                        <td class="col-md-2"><b><?php echo ($value['giaMoi']*$value['quantity']); ?></b></td>
                        <td class="col-md-2">                               
                            <a href="<?php echo URL_BASE.'index/deleteToCart/?id='. $value['ma']; ?>" class="btn btn-sm btn-danger">Xóa</a>   
                        </td>
                    </tr>  
                    <?php
                    $total+=$value['giaMoi']*$value['quantity'];
                    }
                ?>                     
                </table>       
                <p style="font-size: 18px"><b>Tổng số tiền: </b><span><i><b>$<?php echo $total; ?></b></i></span></p>
                <br>
                <div style="float: left;">
                    <a href="<?php echo URL_BASE;?>" class="btn btn-primary">Tiếp tục mua hàng</a>
                    <a href="<?php echo URL_BASE;?>index/thanhToan" class="btn btn-danger">Thanh toán</a>   
                </div>                  
            </div>
        </div>
        <?php }else{ echo "<div class='alert alert-danger'>Giỏ hàng trống!</div>"; } ?>
    </div>
</content>