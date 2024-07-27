<?php

require_once("./db_connect.php");

if (!isset($_POST["name"])) {
    die("請循正常管道進入");
}

$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];
$phone = $_POST["phone"];
$photo = $_FILES["photo"];
$address = $_POST["address"];
$gender = $_POST["gender"];
$id = $_POST["id"];

$filename = "";


if ($_FILES["photo"]["error"] == 0) {
    $filename = time();
    $fileExt = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $filename = $filename . "." . $fileExt;



    if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/img/account_img/" .  $filename)) {
        // $filename = $_FILES["photo"]["name"];
        $now = date('Y-m-d H:i:s');
        // $sql = "INSERT INTO user (photo) VALUES ('$filename')";



        echo "upload success!";
    } else {
        echo "upload failed!";
    }
} else {
    $filename = $_POST["photo"]; 
}

$sql = "UPDATE user SET photo='$filename', name='$name',account='$account',password='$password',birthday='$birthday',phone='$phone',address='$address',gender = '$gender' WHERE id=$id";

// var_dump($_FILES["phot"]);

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();

header("location: user.php?id=$id");
