<?php
    session_start();
    if(isset($_SESSION['email'])){
        require 'chat.php';
        $chat = new Chat();
        $chat->luu();
        // $chat->luuanh();
        $chat->in();
    }else{
        echo "<a href='#' data-toggle='modal' data-target='#login-modal' style='display: block; text-align: center; font-weight: 600'>ĐĂNG NHẬP ĐỂ SỬ DỤNG</a>";
    }
?>