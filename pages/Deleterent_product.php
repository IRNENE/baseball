<?php
include './db_connect.php';

$id=$_GET["id"];

$sql="UPDATE rent  SET valid=0 WHERE id=$id";
if($conn->query($sql)===true){
    echo "刪除商品成功";
}else{
    echo"刪除商品失敗".$conn->error;
}

$conn->close();

header("location:rent_products.php");