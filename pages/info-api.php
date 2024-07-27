<?php
require_once("../db_connect.php");


if (!isset($_POST["className"])) {

    $data = [
        "status" => 0,
        "message" => "參數錯誤"
    ];
    // echo "請循正常管道進入此頁";
    echo json_encode($data);
    exit;
}

$className = $_POST["className"];

$sql = "SELECT * FROM `product_info` WHERE `class`='$className'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    $data = [
        "status" => 0,
        "message" => "無此類別"
    ];
} else {
    $data = [
        "status" => 1,
        "info" => $row
    ];
}

echo json_encode($data);

$conn->close();
