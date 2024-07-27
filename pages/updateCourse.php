<?php
require_once("./db_connect.php");

if (!isset($_POST["name"])) {
    die("請循正常管道進入");
}

$name = $_POST["name"];
$selectype=isset($_POST["type"]) ? $_POST["type"] :[];

$price = $_POST["price"];
$teacher = $_POST["teacher_id"];
$description = $_POST["description"];
$course_start = $_POST["course_start"];
$course_end = $_POST["course_end"];
// $photo=$_POST["photo"];
$id = $_POST["id"];


// 將類型陣列轉換為字串，以便存儲到資料庫中
$type=implode("," ,$selectype);

if ($_FILES["photo"]["error"] == 0) {
    $filename = time();
    $fileExt = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
    $filename = $filename.".".$fileExt;
    // echo $filename;
    // exit;


    // 將文件從暫存位置移動到目標資料夾
   move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/img/course_img/" . $filename);

//         echo "上傳成功";
//     } else {
//         echo "上傳失敗";
//     }
// }





$sql = "UPDATE course SET name='$name',type='$type',price='$price',teacher_id='$teacher',description='$description',course_start='$course_start',course_end='$course_end',photo='$filename' WHERE id=$id";

}else{
    $sql = "UPDATE course SET name='$name',type='$type' ,price='$price',teacher_id='$teacher',description='$description',course_start='$course_start',course_end='$course_end' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();

header("location:course.php?id=$id");
?>