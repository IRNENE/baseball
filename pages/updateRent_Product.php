<?php

require_once("./db_connect.php");

if(!isset($_POST["id"])){
    die("請循正常管道進入");
}

// 處理上傳的圖片
$imagePath = "assets/img/rent_product_img/" . basename($_FILES["image"]["name"]);
$uploadedFilePath = $_FILES["image"]["tmp_name"];

// 確保目錄存在，如果不存在則創建
$uploadDirectory = "../assets/img/rent_product_img/";
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// 複製上傳的文件到指定目錄
if (move_uploaded_file($uploadedFilePath, $uploadDirectory . basename($_FILES["image"]["name"]))) {
    echo "文件已成功上傳。";
} else {
    echo "上傳文件失敗。";
}
  // 將顏色和尺寸組合為逗號分隔的字符串
  
$name=$_POST["productName"];
$price=$_POST["price"];
$class=$_POST["class"];
$colorsSelected = isset($_POST["colors"]) ? $_POST["colors"] : [];
$sizesSelected = isset($_POST["sizes"]) ? $_POST["sizes"] : [];
$brand=$_POST["brand"];
$other=$_POST["other"];
$description=$_POST["description"];
$id=$_POST["id"];
$mode=$_POST["mode"];

$color = implode(',', $colorsSelected);
$size = implode(',', $sizesSelected);

if($imagePath!="assets/img/rent_product_img/"){
    $sql="UPDATE rent SET name='$name',price='$price',class_id='$class',other_id='$other',colors='$color',brand_id='$brand',sizes='$size',image_url='$imagePath',mode='$mode',created_at=now() WHERE id=$id";
}
else
{$sql="UPDATE rent SET name='$name',price='$price',class_id='$class',other_id='$other',colors='$color',brand_id='$brand',sizes='$size',mode='$mode',created_at=now() WHERE id=$id";}

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}
echo '<script>';
echo 'setTimeout(function() {';
echo '    window.location.href = "rent_products.php";';
echo '}, 2000);';
echo '</script>';

$conn->close();

header("location: rent_products.php");

