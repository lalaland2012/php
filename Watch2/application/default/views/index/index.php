<div class="container-fluid slider">
    <div class="row">
        <div class="col-md-12" id="slider">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <?php  
                    $slide=1;
                    while ($row2 = $this->objSlide->fetch(PDO::FETCH_ASSOC)) {
                        extract($row2);                                
                    ?>                    
                        <?php if ($slide==1){ ?>
                        <div class="item active">
                        <?php }else{ ?>
                        <div class="item">
                        <?php } ?>
                        <img alt="Third slide" src="<?php echo URL_BASE;?>templates/default/img/<?php echo $anh; ?>" style="width: 100%" class="imgSlide">
                    </div>
                    <?php $slide++; } ?>
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>
            </div>
        </div>
    </div>
</div> 
<!-- End Slider -->
<content class="container-fluid">
    <div class="container" id="result2">
        <div class="row">
            <div class="col-md-3 col-xs-12 left-content">   
                <!-- Lọc -->
                <div class="p-watch">
                    <a href="#"><p class="left-post">LỌC THEO GIÁ</p></a>
                </div>
                <div class="form-group">
                  <select class="form-control" onchange="locTheoGia(this.value);">
                    <option value="0">-- Chọn mức giá --</option>
                    <option value="400">Từ $0 -> $400</option>
                    <option value="700">Từ $400 -> $700</option>
                    <option value="1000">Từ $700 -> $1000</option>
                  </select>
                </div> 
                <!-- <div class="btn-sosanh" style="text-align: center;">
                    <a href="#" class="btn btn-danger btn-md" style="width: 100%;font-weight: bold;margin-bottom: 20px;">Lọc</a>
                </div>   -->                
                <!-- So sánh -->
                <div class="hidden-xs">
                    <div class="p-watch">
                        <a href="<?php echo URL_BASE;?>index/soSanh"><p class="left-post" style="margin-top: 30px;">BẢNG SO SÁNH</p></a>
                    </div>
                    <div id="soSanh1" class="alert alert-success">
                        So sánh tối đa 3 sản phẩm!!!
                    </div>
                    <!-- so sánh -->                    
                    <div class="hidden-xs">
                        <div class="p-watch1">
                            <a href="#"><p class="left-post" style="margin-top: 50px;">KHUYẾN MẠI SỐC</p></a>
                        </div>
                        <?php  
                        while ($rowKhuyenMai = $this->objDongHoKhuyenMai->fetch(PDO::FETCH_ASSOC)) {
                            extract($rowKhuyenMai);  
                        ?>
                        <div class="sale-watch">
                            <a href="<?php echo URL_BASE;?>index/detail?id=<?php echo $dongho_id;?>&th=<?php echo $thuonghieu_id;?>"><img src="<?php echo URL_BASE;?><?php echo $anh; ?>" class="img-sale-watch"/></a>
                            <div style="height: 50px;"><p class="p-sale-watch"><?php echo $ten; ?></div>
                            <p><?php echo $day; ?></p>
                            <p class="gia-sale">$<?php echo $giaMoi; ?> <span class="span-sale-watch">$<?php echo $giaCu; ?></span></p>
                            <a href="" onclick="liveSoSanh('<?php echo $ma;?>');"class="btn btn-default btn-sm" style="margin-top: 5px;">So sánh</a>
                            <a href="#" onclick="livesale('<?php echo $ma;?>');" class="btn btn-danger btn-sm" style="margin-top: 5px;">Mua ngay</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>            
            <div class="col-md-9 col-xs-12 right-content" id="locTheoGia"> 
                <div> <!-- ĐH mới nhất -->
                    <div class="p-watch">
                        <a href="#"><p class="left-post">ĐỒNG HỒ MỚI NHẤT</p></a>
                    </div>
                      <!-- Wrapper for slides -->
                    <div class="owl-carousel owl-theme DHMoiNhat">
                        <?php while ($row = $this->objDongHoMoiNhat->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);   ?>
                        <div class="item sale-watch">
                            <a href="<?php echo URL_BASE;?>index/detail?id=<?php echo $dongho_id;?>&th=<?php echo $thuonghieu_id;?>"><img style="width: 80%;margin-left: 10%" src="<?php echo URL_BASE;?><?php echo $anh; ?>" class="img-sale-watch"/></a>
                                <div style="height: 50px;"><p class="p-sale-watch"><?php echo $ten; ?></div>
                                <p><?php echo $day; ?></p>
                                <p class="gia-sale">$<?php echo $giaMoi; ?> <span class="span-sale-watch">$<?php echo $giaCu; ?></span></p>
                                <a href="#" onclick="liveSoSanh('<?php echo $ma;?>');"class="btn btn-default btn-sm" style="margin-top: 5px;">So sánh</a>
                                <a href="#" onclick="livesale('<?php echo $ma;?>');" class="btn btn-danger btn-sm" style="margin-top: 5px;">Mua ngay</a>
                        </div>
                    <?php } ?>
                    </div>
                    <hr>
                </div>  <!-- End.ĐH mới nhất -->                
                <div> <!-- ĐH giá rẻ -->
                    <div class="p-watch">
                        <a href="#"><p class="left-post">ĐỒNG HỒ GIÁ RẺ</p></a>
                    </div>
                      <!-- Wrapper for slides -->
                    <div class="owl-carousel owl-theme">
                        <?php while ($row = $this->objDongHoGiaRe->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);   ?>
                        <div class="item sale-watch text-center">
                            <a href="<?php echo URL_BASE;?>index/detail?id=<?php echo $dongho_id;?>&th=<?php echo $thuonghieu_id;?>"><img style="width: 80%;margin-left: 10%" src="<?php echo URL_BASE;?><?php echo $anh; ?>" class="img-sale-watch"/></a>
                            <div style="height: 50px;"><p class="p-sale-watch"><?php echo $ten; ?></div>
                            <p><?php echo $day; ?></p>
                            <p class="gia-sale">$<?php echo $giaMoi; ?> <span class="span-sale-watch">$<?php echo $giaCu; ?></span></p>
                            <a href="#" onclick="liveSoSanh('<?php echo $ma;?>');"class="btn btn-default btn-sm" style="margin-top: 5px;">So sánh</a>
                            <a href="#" onclick="livesale('<?php echo $ma;?>');" class="btn btn-danger btn-sm" style="margin-top: 5px;">Mua ngay</a>
                        </div>
                    <?php } ?>
                    </div>
                    <hr>
                </div>  <!-- End.ĐH giá rẻ -->
            </div>             
        </div>
    </div>
</content>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    })
    $('.DHMoiNhat').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    })
</script>