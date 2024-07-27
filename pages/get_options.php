<?php
include 'db_connect.php';

if (isset($_GET['class'])) {
    $selectedClass = $_GET['class'];

    // 查詢對應 class 的 other、brand、size 和 color 值
    $query = "SELECT `other`, `brand`, `size`, `color` FROM `product_info` WHERE `class` = '$selectedClass'";
    $result = mysqli_query($conn, $query);

    // 檢查是否有錯誤
    if (!$result) {
        die("查詢失敗：" . mysqli_error($conn));
    }

    // 將查詢結果轉為 JSON 格式並輸出
    $options = mysqli_fetch_assoc($result);
    $options['other'] = explode(',', $options['other']);
    $options['brand'] = explode(',', $options['brand']);
    $options['size'] = explode(',', $options['size']);
    $options['color'] = explode(',', $options['color']);
    $options = array_map('array_unique', $options); // 移除重複的值

    echo json_encode($options);

    mysqli_close($conn);
}
?>
