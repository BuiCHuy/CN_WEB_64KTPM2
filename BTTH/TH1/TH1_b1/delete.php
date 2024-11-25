<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $index=$_POST["index"];
    unset($_SESSION["flowers"][$index]);
    header("Location: index.php");
    exit;
}