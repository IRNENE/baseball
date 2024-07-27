<?php
require_once("../db_connect.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

}else{
    echo "沒有找到 ID ";
}

$sql = "UPDATE `product` SET `valid` = 0 WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();

header("location: product-list.php");


