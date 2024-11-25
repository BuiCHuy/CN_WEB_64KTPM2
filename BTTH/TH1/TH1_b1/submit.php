<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $description = $_POST["descr"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if(isset($_POST["index"])){
            $index = $_POST["index"];
            $_SESSION['flowers'][$index] = ['name'=>$name, 'Mô tả'=>$description, 'Ảnh'=>$target_file];
        }
        else{
            $_SESSION['flowers'][] = ['name'=>$name, 'Mô tả'=>$description, 'Ảnh'=>$target_file];
        }

       header ('Location: index.php');
        exit;
    } else {
        echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
    }
}
