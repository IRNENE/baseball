<?php
require_once("./db_connect.php");

if(!isset($_POST["name"])){
    die("請循正常管道進入");
}

$name=$_POST["name"];
$description=$_POST["description"];
// $photo=$_POST["photo"];
$id=$_POST["id"];

if ($_FILES["photo"]["error"] == 0) {
    $filename = time();
    $fileExt = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
    $filename = $filename.".".$fileExt;
    // echo $filename;
    // exit;


    // 將文件從暫存位置移動到目標資料夾
     move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/img/teacher_img/" . $filename);

    //     echo "上傳成功";
    // } else {
    //     echo "上傳失敗";
    // }



$sql="UPDATE teacher SET name='$name',description='$description',photo='$filename' WHERE id=$id";
}else{
    $sql="UPDATE teacher SET name='$name',description='$description' WHERE id=$id";
}

if ($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新資料錯誤: ".$conn->error;
}

$conn->close();

header("location:teacher.php?id=$id");