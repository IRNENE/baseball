<?php
// 連接到資料庫的代碼（使用 mysqli 或 PDO）
include './db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 獲取商品信息
    $productName = $_POST["productName"];
    $price = $_POST["price"];
    $colorsSelected = isset($_POST["colors"]) ? $_POST["colors"] : [];
    $sizesSelected = isset($_POST["sizes"]) ? $_POST["sizes"] : [];
    $description = $_POST["description"];
    $classText = isset($_POST["class"]) ? $_POST["class"] : '';
    $otherText = isset($_POST["other"]) ? $_POST["other"] : '';
    $brandText = isset($_POST["brand"]) ? $_POST["brand"] : '';

    // 將顏色和尺寸組合為逗號分隔的字符串
    $colors = implode(',', $colorsSelected);
    $sizes = implode(',', $sizesSelected);

    // 處理上傳的圖片
    $imagePath = "assets/img/rent_product_img/" . basename($_FILES["image"]["name"]);
    $uploadedFilePath = $_FILES["image"]["tmp_name"];

    // 確保目錄存在，如果不存在則創建
    $uploadDirectory = "../assets/img/rent_product_img/";
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // 複製上傳的文件到指定目錄
    move_uploaded_file($uploadedFilePath, $uploadDirectory . basename($_FILES["image"]["name"]));


    // 插入商品信息到資料庫
    $query = "INSERT INTO `rent` (`name`, `price`, `colors`, `sizes`, `class_id`, `other_id`, `brand_id`, `description`, `image_url`, `created_at`,`mode`,`valid`) 
                VALUES ('$productName', $price, '$colors', '$sizes', '$classText', '$otherText', '$brandText', '$description', '$imagePath', NOW(),'上架', 1)";

    // 執行查詢
    $result = mysqli_query($conn, $query);

    // 檢查是否有錯誤
    if (!$result) {
        die("新增失敗：" . mysqli_error($conn));
    }

    // 關閉資料庫連接
    mysqli_close($conn);

    echo "商品新增成功，兩秒後返回租借商品列表";

    // 等待5秒后跳轉到 view_products.php
    echo '<script>';
    echo 'setTimeout(function() {';
    echo '    window.location.href = "rent_products.php";';
    echo '}, 2000);';
    echo '</script>';
}

?>