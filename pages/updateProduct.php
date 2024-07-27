<?php

require_once("../db_connect.php");

if (!isset($_POST["productName"])) {
    die("請循正常管道進入");
}

$name = $_POST["productName"];
$class = $_POST["productClass"];
$other = $_POST["productOther"];
$color = $_POST["productColor"];
$size = $_POST["productSize"];
$brand = $_POST["productBrand"];
$price = $_POST["productPrice"];
$description = $_POST["productDescription"];
$id = $_POST["productId"];

$color = implode(',', $color);
$size = implode(',', $size);


if ($_FILES["productImage"]["error"] == 0) {
    $filename = time();
    $fileExt = pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
    $filename = $filename . "." . $fileExt;

    move_uploaded_file($_FILES["productImage"]["tmp_name"], "../assets/img/product_img/" . $filename);

    $now = date("Y-m-d H:i:s");

    $sql = " UPDATE `product` SET `name`='$name', `price`='$price', `class`='$class', `other`='$other', `brand`='$brand', `color`='$color', `size`='$size', `description`='$description', `image_url`='$filename', `created_at`='$now', `valid`=1 WHERE `id`= $id";
} else {

    $now = date("Y-m-d H:i:s");

    $sql = " UPDATE `product` SET `name`='$name', `price`='$price', `class`='$class', `other`='$other', `brand`='$brand', `color`='$color', `size`='$size', `description`='$description', `created_at`='$now', `valid`=1 WHERE `id`= $id";
}


// if (move_uploaded_file($_FILES["productImage"]["tmp_name"], "../assets/img/product_img/" . $filename)) {

//     $now = date("Y-m-d H:i:s");

//     $sql = " UPDATE `product` SET `name`='$name', `price`='$price', `class`='$class', `other`='$other', `brand`='$brand', `color`='$color', `size`='$size', `description`='$description', `image_url`='$filename', `created_at`='$now', `valid`=1 WHERE `id`= $id";

// } else {

//     $now = date("Y-m-d H:i:s");

//     $sql = " UPDATE `product` SET `name`='$name', `price`='$price', `class`='$class', `other`='$other', `brand`='$brand', `color`='$color', `size`='$size', `description`='$description', `created_at`='$now', `valid`=1 WHERE `id`= $id";

// }


if ($conn->query($sql)) {

    echo '<script>';
    echo '    window.location.href = "product-content.php?id=' . $id . '";';
    echo '</script>';
} else {
    echo "更新資料錯誤: " . $conn->error;
}


$conn->close();
