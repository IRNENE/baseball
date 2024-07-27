<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
        include 'db_connect.php';

        // 查詢所有不重複的 class 值
        $query = "SELECT DISTINCT `class` FROM `product_info`";
        $result = mysqli_query($conn, $query);

        // 檢查是否有錯誤
        if (!$result) {
            die("查詢失敗：" . mysqli_error($conn));
        }

        // 將查詢結果加入下拉式選單中
        while ($row = mysqli_fetch_assoc($result)) {
            $classValue = $row['class'];
            echo "<option value=\"$classValue\">$classValue</option>";
        }

        mysqli_close($conn);
?>