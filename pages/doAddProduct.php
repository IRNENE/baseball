<?php

require_once("../db_connect.php");

if(!isset($_POST["productName"])){
    echo "請循正常管道進入";
    exit;
}

$name = $_POST["productName"];
$class = $_POST["productClass"];
$other = $_POST["productOther"];
$color = $_POST["productColor"];
$size = $_POST["productSize"];
$brand = $_POST["productBrand"];
$price = $_POST["productPrice"];
$description = $_POST["productDescription"];

$color = implode(',', $color);
$size = implode(',', $size);


if (empty($name) || empty($class) || empty($other) || empty($color) ||  empty($brand) || empty($price)) {
    echo "請輸入必要欄位";
    exit;
}

if ($_FILES["productImage"]["error"] == 0) {
    $filename = time();
    $fileExt = pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
    $filename = $filename . "." . $fileExt;
}

if (move_uploaded_file($_FILES["productImage"]["tmp_name"], "../assets/img/product_img/" . $filename)) {

    $now = date("Y-m-d H:i:s");

    $sql = " INSERT INTO `product`(`name`, `price`, `class`, `other`, `brand`, `color`, `size`, `description`, `image_url`, `created_at`, `valid`) VALUES ('$name', '$price', '$class', '$other', '$brand', '$color', '$size', '$description', '$filename', '$now', 1)";

    // echo $sql;

    if ($conn->query($sql)) {

        // echo "商品新增完成 !";

        echo '<script>';
        // echo 'setTimeout(function() {';
        echo '    window.location.href = "product-list.php";';
        // echo '}, 1000);';
        echo '</script>';
    } else {
        echo "新增資料錯誤: " . $conn->error;
    }
}

$conn->close();
