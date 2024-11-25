<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["pname"];
    $price = $_POST["pprice"];
    if(isset($_POST['index'])){
        $_SESSION['products'][$_POST['index']] = ['name'=>$name, 'price'=>$price];
    }
    else {
        $_SESSION['products'][] = ['name' => $name, 'price' => $price];
    }

    header("location: index.php");
    exit;
}
?>

