<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script>
    
</script>
<?php
    require "database.php";
    class Chat{
        public function luu(){
            if(isset($_POST['content'])){
                $conn = Database::connect();
                $sql = "INSERT INTO chat(noidung, khachhang_id) VALUES (:noidung, :khachhang_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':noidung', $message);
                $stmt->bindParam(':khachhang_id', $usernameID);
                $message = Database::test_input($_POST['content']);
                $usernameID = Database::test_input($_SESSION['khachhang_id']);
                $stmt->execute();
            }
        }
        public function in(){
            $conn = Database::connect();
            $sql = "SELECT khachhang.email, chat.noidung, chat.createat FROM khachhang INNER JOIN chat on khachhang.khachhang_id = chat.khachhang_id ORDER BY createat ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $k => $v){
                echo $v['email'].": ".$v['noidung'];
                // echo "<div class='tooltip'>";
                // echo "abc";
                // echo "<span class='tooltiptext'>";
                // echo $v['createat'];
                // echo "</span>";
                // echo "</div>";
                echo "<br>";
            }            
        }
        public function luuanh(){
            if(isset($_FILES["fileToUpload"]["name"])){
            
            $target_dir = "templates/default/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        }
    }
?>
