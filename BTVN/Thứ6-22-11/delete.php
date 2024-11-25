<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    unset($_SESSION["products"][$_POST["index"]]);
    header("location:index.php");
    exit;
}
