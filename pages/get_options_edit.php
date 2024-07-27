<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 查詢對應 class 的 other、brand、size 和 color 值
    $query = "SELECT `other_id`, `brand_id`, `sizes`, `colors`,`description` FROM `rent` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    // 檢查是否有錯誤
    if (!$result) {
        die("查詢失敗：" . mysqli_error($conn));
    }

    // 將查詢結果轉為 JSON 格式並輸出
    $options = mysqli_fetch_assoc($result);
    $options['other_id'] = explode(',', $options['other_id']);
    $options['brand_id'] = explode(',', $options['brand_id']);
    $options['sizes'] = explode(',', $options['sizes']);
    $options['colors'] = explode(',', $options['colors']);


    echo json_encode($options);

    mysqli_close($conn);
}
?>
