<?php
session_start();
require_once("../db_connect.php");

// 想要一頁呈現幾筆
$perPage = 8;

// 全部的商品
$sqlAll = "SELECT * FROM product WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$rowsAll = $resultAll->fetch_all(MYSQLI_ASSOC);
$rowAllCount = $resultAll->num_rows;
// 全部商品總數量 / 一頁有幾筆 = 總頁數
$pageCount = ceil($rowAllCount / $perPage);

// 當前頁數
if (isset($_GET["p"])) {
    $p = $_GET["p"];
} else {
    $p = 1;
}

// 計算起始頁和結束頁
$startPage = max(1, $p - 2);
$endPage = min($pageCount, $startPage + 4);

// 如果結束頁超過總頁數，調整起始頁
if ($endPage - $startPage < 4) {
    $startPage = max(1, $endPage - 4);
}



// 排序 order 
if (isset($_GET["order"])) {
    $order = $_GET["order"];
    if ($order == 1) {
        $orderString = "ORDER BY id ASC";
    } elseif ($order == 2) {
        $orderString = "ORDER BY id DESC";
    } elseif ($order == 3) {
        $orderString = "ORDER BY price ASC";
    } elseif ($order == 4) {
        $orderString = "ORDER BY price DESC";
    } elseif ($order == 5) {
        $orderString = "ORDER BY created_at ASC";
    } elseif ($order == 6) {
        $orderString = "ORDER BY created_at DESC";
    }
} else {
    $orderString = "ORDER BY id ASC";
}


// 分頁判斷
if (isset($_GET["class"]) && isset($_GET["p"])) {
    // 有選了類別，而且有按分頁
    $class = $_GET["class"];
    $p = $_GET["p"];
    $startIndex = ($p - 1) * $perPage;

    // 為了能在點選類別時，可以呈現該類別的 總數量 / 一頁有幾筆
    $sqlClass = "SELECT * FROM product WHERE class = '$class' AND valid=1";
    $resultClass = $conn->query($sqlClass);
    $rowsClassCount = $resultClass->num_rows;
    $pageClassCount = ceil($rowsClassCount / $perPage);

    // 計算起始頁和結束頁
    $startPage = max(1, $p - 2);
    $endPage = min($pageClassCount, $startPage + 4);

    // 如果結束頁超過總頁數，調整起始頁
    if ($endPage - $startPage < 4) {
        $startPage = max(1, $endPage - 4);
    }

    // 結果
    $whereClause = "WHERE class = '$class' AND valid=1";
    $pageClause = "LIMIT $startIndex, $perPage";
} elseif (isset($_GET["p"])) {
    // 沒有選類別，在「全部」的狀態下，按下分頁
    $p = $_GET["p"];
    $startIndex = ($p - 1) * $perPage;

    // 結果
    $whereClause = "WHERE valid=1";
    $pageClause = "LIMIT $startIndex, $perPage";
} elseif (isset($_GET["class"])) {
    // 已經選了類別，但還沒有選分頁
    $p = 1;
    $class = $_GET["class"];
    $startIndex = ($p - 1) * $perPage;

    // 為了能在點選類別時，可以呈現該類別的 總數量 / 一頁有幾筆
    $sqlClass = "SELECT * FROM product WHERE class = '$class' AND valid=1";
    $resultClass = $conn->query($sqlClass);
    $rowsClassCount = $resultClass->num_rows;
    $pageClassCount = ceil($rowsClassCount / $perPage);

    // 計算起始頁和結束頁
    $startPage = max(1, $p - 2);
    $endPage = min($pageClassCount, $startPage + 4);

    // 如果結束頁超過總頁數，調整起始頁
    if ($endPage - $startPage < 4) {
        $startPage = max(1, $endPage - 4);
    }

    // 結果
    $whereClause = "WHERE class = '$class' AND valid=1";
    $pageClause = "LIMIT $startIndex, $perPage";
} elseif (isset($_GET["search"])) {

    $search = $_GET["search"];

    $whereClause = "WHERE name LIKE '%$search%' OR price LIKE '%$search%' OR class LIKE '%$search%' OR other LIKE '%$search%' OR brand LIKE '%$search%'  OR color LIKE '%$search%' OR size LIKE '%$search%' AND valid=1";

    $pageClause = "";
} else {
    // 沒有選類別，也沒有選分頁
    $p = 1;
    $startIndex = ($p - 1) * $perPage;

    $whereClause = "WHERE valid=1";
    $pageClause = "LIMIT $startIndex, $perPage";
}

$sql = "SELECT * FROM product $whereClause $orderString $pageClause";

$result = $conn->query($sql);

$rows = $result->fetch_all(MYSQLI_ASSOC);

$rowscount = $result->num_rows;


// 為了撈出類別欄位
$sqlInfoClass = "SELECT class FROM product_info";
$resultInfoClass = $conn->query($sqlInfoClass);
$rowsInfoClass = $resultInfoClass->fetch_all(MYSQLI_ASSOC);



?>

<!doctype html>
<html lang="en">

<head>
    <!-- 網頁favcon -->
    <link rel="icon" type="image/png" href="../assets/img/694606.png">
    <title>商品管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php
    include("../assets/css/css_yu.php");
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/css/ader.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <!-- logo 回首頁連結 -->
            <img src=" ../assets/img/logo(5-3).png" class="navbar-brand-img h-100" alt="main_logo" usemap="#workmap">
            <map name="workmap">
                <area shape="circle" coords="144, 144, 70" href="./firststage.php">
            </map>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav accordion" id="accordionExample">
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-user-group fa-fw"></i> 會員管理</span>
                        </button>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./users.php">
                                <span class="nav-link-text ms-1">會員列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./adduser.php">
                                <span class="nav-link-text ms-1">新增會員</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-rectangle-list fa-fw"></i> 訂單管理</span>
                        </button>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./product_order.php">
                                <span class="nav-link-text ms-1">訂單列表</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed active bg-gradient-primary mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-basket-shopping fa-fw"></i> 商品管理</span>
                        </button>
                    </div>
                    <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./product-list.php">
                                <span class="nav-link-text ms-1">商品列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./product-add.php">
                                <span class="nav-link-text ms-1">新增商品</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header  ">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-baseball fa-fw"></i> 租借商品管理</span>
                        </button>
                    </div>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./rent_products.php">
                                <span class="nav-link-text ms-1">租借列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./add-rent_product.php">
                                <span class="nav-link-text ms-1 text-nowrap">新增租借商品</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-baseball-bat-ball fa-fw"></i> 商品類別管理</span>
                        </button>
                    </div>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./category_all.php">
                                <span class="nav-link-text ms-1 text-nowrap">商品類別清單</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./addClass.php">
                                <span class="nav-link-text ms-1">新增類別</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./addOther.php">
                                <span class="nav-link-text ms-1  text-nowrap">新增類別細項</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-ticket fa-fw"></i> 優惠券管理</span>
                        </button>
                    </div>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./coupon.php?status=1&p=1">
                                <span class="nav-link-text ms-1">優惠券列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./coupon-add.php">
                                <span class="nav-link-text ms-1 text-nowrap">新增優惠券</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-school fa-fw"></i> 課程管理</span>
                        </button>
                    </div>
                    <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./course_list.php">
                                <span class="nav-link-text ms-1">課程列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./addCourse.php">
                                <span class="nav-link-text ms-1">新增課程</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-user-secret fa-fw"></i> 教練管理</span>
                        </button>
                    </div>
                    <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./teacher_list.php">
                                <span class="nav-link-text ms-1">教練列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./addTeacher.php">
                                <span class="nav-link-text ms-1">新增教練</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item accordion-item">
                    <!-- 超連結 -->
                    <div class="accordion-header">
                        <button class="nav-link text-white accordion-button collapsed mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            <span class="nav-link-text ms-1"><i class="fa-solid fa-book-tanakh fa-fw"></i> 文章管理</span>
                        </button>
                    </div>
                    <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a class="text-white  nav-ader" href="./article.php">
                                <span class="nav-link-text ms-1">文章列表</span>
                            </a>
                            <a class="text-white nav-ader" type="button" href="./insert_article.php">
                                <span class="nav-link-text ms-1">新增文章</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="./firststage.php">後臺管理</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">商品管理</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">商品列表</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- 商品管理清單頁面 -->
        <div class="container">
            <div class="row">
                <?php if (!isset($_GET["search"])) : ?>
                    <h2 class="text-center">商品列表</h2>
                <?php else : ?>
                    <h2 class="text-center">搜尋結果</h2>
                <?php endif; ?>

                <!-- 類別選擇欄位 -->
                <?php if (!isset($_GET["search"])) : ?>
                    <div class="row">
                        <div class="my-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link
                    <?php if (!isset($_GET["class"])) echo "active"; ?>
                    " aria-current="page" href="product-list.php">全部</a>
                                </li>

                                <?php foreach ($rowsInfoClass as $infoClass) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link nav-color-yu 
                        <?php if (isset($_GET["class"]) && $_GET["class"] == $infoClass["class"]) echo "active"; ?>" aria-current="page" href="product-list.php?class=<?= $infoClass["class"] ?>">
                                            <?= $infoClass["class"] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>





                <?php if ($rowscount > 0) : ?>
                    <div class="row d-flex justify-content-start align-items-end">
                        <!-- 搜尋欄位 -->
                        <?php if (isset($_GET["search"])) : ?>
                            <div class="col-auto">
                                <a class="btn btn-primary my-3 btn-index-yu" href="product-list.php">
                                    <i class="fa-solid fa-arrow-left fa-fw"></i> 返回
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="col-4">
                            <form action="">
                                <div class="input-group my-3">
                                    <input type="search" class="form-control p-2" placeholder="全部商品搜尋..." aria-label="Recipient's username" aria-describedby="button-addon2" name="search" <?php if (isset($_GET["search"])) : $searchValue = $_GET["search"]; ?> value="<?= $searchValue ?>" <?php endif; ?> required>

                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass fa-fw"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>






                    <div class="row d-flex p-1 mx-auto">

                        <!-- 共有幾件商品 -->
                        <div class="col-8 page-span d-flex align-items-end">
                            <!-- 全部的 -->
                            <?php if ($rowscount > 0 && !isset($_GET["class"]) && !isset($_GET["search"])) : ?>
                                共 <?= $rowAllCount ?> 件商品 , &nbsp;第&nbsp;<?= "<span>" . $p . "</span>" ?>&nbsp;頁 / 共 <?= $pageCount ?> 頁
                            <?php elseif ($rowscount > 0 && !isset($_GET["class"]) && isset($_GET["search"])) : ?>
                                共 <?= $rowscount ?> 件商品
                                <!-- 點選各分類後的 -->
                            <?php elseif ($rowscount > 0 && isset($_GET["class"])) : ?>
                                共 <?= $rowsClassCount ?> 件商品 , &nbsp;第&nbsp;<?= "<span>" . $p . "</span>" ?>&nbsp;頁 / 共 <?= $pageClassCount ?> 頁

                            <?php endif; ?>
                        </div>




                        <div class="col-4 d-flex justify-content-end">
                            <!-- 排序的部分 -->
                            <?php if (!isset($_GET["search"])) : ?>

                                <!-- 有點選類別，然後點排序的狀態 -->
                                <?php if (isset($_GET["class"])) : ?>
                                    <div class="btn-group col-auto mb-2 nowrap d-flex align-items-end justify-content-end" role="group" aria-label="Button group with nested dropdown">

                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if (!isset($order)) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大";
                                            } elseif ($order == 1) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大 ";
                                            } elseif ($order == 2) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 :  大 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 小 ";
                                            } elseif ($order == 3) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 低 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 高 ";
                                            } elseif ($order == 4) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 高 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 低 ";
                                            } elseif ($order == 5) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 舊 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 新 ";
                                            } elseif ($order == 6) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 新 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 舊 ";
                                            } ?>
                                        </button>
                                        <ul class="dropdown-menu">

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=1">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=2">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 大 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 小
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=3">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 低 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 高
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=4">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 高 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 低
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=5">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 舊 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 新
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?class=<?= $class ?>&p=<?= $p ?>&order=6">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 新 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 舊
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- 沒有點選類別(位於全部)，然後點排序的狀態 -->
                                <?php else : ?>
                                    <div class="btn-group col-auto mb-2 nowrap d-flex align-items-end justify-content-end" role="group" aria-label="Button group with nested dropdown">

                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if (!isset($order)) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大";
                                            } elseif ($order == 1) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大 ";
                                            } elseif ($order == 2) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 :  大 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 小 ";
                                            } elseif ($order == 3) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 低 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 高 ";
                                            } elseif ($order == 4) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 高 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 低 ";
                                            } elseif ($order == 5) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 舊 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 新 ";
                                            } elseif ($order == 6) {
                                                echo "排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 新 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 舊 ";
                                            } ?>
                                        </button>
                                        <ul class="dropdown-menu">

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=1">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 小 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 大
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=2">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 編號 : 大 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 小
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=3">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 低 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 高
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=4">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 價格 : 高 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 低
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=5">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 舊 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 新
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="product-list.php?p=<?= $p ?>&order=6">
                                                    排序 <i class='fa-solid fa-baseball fa-fw'></i> 更新時間 : 新 <i class='fa-solid fa-arrow-right-long fa-fw'></i> 舊
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>


                            <!-- 新增商品的按鈕 -->
                            <?php if (!isset($_GET["search"])) : ?>
                                <div class="col-auto text-end my-2 ms-5">
                                    <a class="btn-bs5 btn-bs5-circle btn-primary" href="product-add.php" role="button">
                                        <i class="fa-solid fa-file-circle-plus fa-fw fa-2xl"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>







                    <!-- 商品清單表格 -->
                    <table id="list-table" class="table-bs5 table-bordered table-striped-bs5 g-1 mx-auto mb-3 align-items-center">
                        <thead>
                            <tr class="text-center">
                                <th class="table-auto-yu">編號</th>
                                <th>圖片</th>
                                <th>商品名稱</th>
                                <th>品牌</th>
                                <th>類別 / 子類別</th>
                                <th>顏色 / 尺寸</th>
                                <th>價格</th>
                                <th>更新時間</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($rows as $product) : ?>
                                <tr>
                                    <td class="table-auto-yu"><?= $product["id"] ?></td>
                                    <td>
                                        <div class="ratio ratio-1x1 table-img-min">
                                            <img class="object-fit-cover" src="../assets/img/product_img/<?= $product["image_url"] ?>" alt="<?= $product["name"] ?>">
                                        </div>
                                    </td>
                                    <td class="text-start"><?= $product["name"] ?></td>
                                    <td><?= $product["brand"] ?></td>
                                    <td class="table-auto-yu"><?= $product["class"] ?> / <?= $product["other"] ?></td>
                                    <td class="text-start table-auto-yu">顏色: <?= $product["color"] ?><br>
                                        尺寸: <?= $product["size"] ?></td>
                                    <td class="table-auto-yu">$ <?= $product["price"] ?></td>
                                    <td><?= $product["created_at"] ?></td>
                                    <td>
                                        <!-- 操作的按鈕 -->
                                        <div class="flex-nowrap d-flex justify-content-center">
                                            <!-- 檢視內容按鈕 -->
                                            <a class="btn-sm-edit btn-primary m-1" href="product-content.php?id=<?= $product["id"] ?>">
                                                <i class="fa-solid fa-eye fa-fw" style="color: #74C0FC;"></i>
                                            </a>
                                            <!-- 修改按鈕 -->
                                            <a class="btn-sm-edit btn-warning m-1" href="product-edit.php?id=<?= $product["id"] ?>">
                                                <i class="fa-solid fa-wand-magic-sparkles fa-fw"></i>
                                            </a>

                                            <!-- 刪除按鈕 : 按下會跳出是否要刪除的 Modal -->
                                            <button class="btn-sm-delete m-1 btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $product["id"] ?>">
                                                <i class="fa-solid fa-trash-can fa-fw"></i>
                                            </button>

                                            <!-- Modal 內容 -->
                                            <div class="modal fade" id="exampleModal<?= $product["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">刪除提醒</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-danger">
                                                            確認要刪除商品嗎?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                                            <a href="doSoftDelete.php?id=<?= $product["id"] ?>">
                                                                <button type="button" class="btn btn-danger">刪除</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- 分頁按鈕 -->
                    <?php if (!isset($_GET["search"])) : ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <!-- 如果有點 order 按鈕，得到order值的情況 -->
                                <?php if (isset($_GET["order"])) : ?>
                                    <!-- 在點 order 狀態下，點選「類別」的分頁 -->
                                    <?php if (isset($_GET["class"])) : ?>

                                        <div class="me-3 d-flex">
                                            <?php if ($p > 1) : ?>
                                                <li class="page-item me-1">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=1&order=<?= $order ?>">
                                                        <i class="fa-solid fa-backward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if ($startPage > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= max(1, $p - 5) ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-angles-left fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                            <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                                                <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= $i ?>&order=<?= $order ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>

                                        <div class="ms-3 d-flex">
                                            <?php if ($endPage < $pageClassCount) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= min($pageClassCount, $p + 5) ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-angles-right fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($p < $pageClassCount) : ?>
                                                <li class="page-item ms-1">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= $pageClassCount ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-forward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>



                                        <!-- 在點 order 狀態下，點選「全部」的分頁 -->
                                    <?php else : ?>
                                        <div class="me-3 d-flex">
                                            <?php if ($p > 1) : ?>
                                                <li class="page-item me-1">
                                                    <a class="page-link" href="product-list.php?p=1&order=<?= $order ?>">
                                                        <i class="fa-solid fa-backward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if ($startPage > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?p=<?= max(1, $p - 5) ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-angles-left fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                            <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                                                <a class="page-link" href="product-list.php?p=<?= $i ?>&order=<?= $order ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>

                                        <div class="ms-3 d-flex">
                                            <?php if ($endPage < $pageCount) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?p=<?= min($pageCount, $p + 5) ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-angles-right fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($p < $pageCount) : ?>
                                                <li class="page-item ms-1">
                                                    <a class="page-link" href="product-list.php?p=<?= $pageCount ?>&order=<?= $order ?>">
                                                        <i class="fa-solid fa-forward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                    <?php endif; ?>


                                    <!-- 如果沒有點 order 按鈕 (一般狀態) 的情況-->
                                <?php else : ?>
                                    <!-- 在一般狀態下，點選「類別」的分頁 -->
                                    <?php if (isset($_GET["class"])) : ?>

                                        <div class="me-3 d-flex">
                                            <?php if ($p > 1) : ?>
                                                <li class="page-item me-1">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=1">
                                                        <i class="fa-solid fa-backward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if ($startPage > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= max(1, $p - 5) ?>">
                                                        <i class="fa-solid fa-angles-left fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                            <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                                                <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>

                                        <div class="ms-3 d-flex">
                                            <?php if ($endPage < $pageClassCount) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= min($pageClassCount, $p + 5) ?>">
                                                        <i class="fa-solid fa-angles-right fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($p < $pageClassCount) : ?>
                                                <li class="page-item ms-1">
                                                    <a class="page-link" href="product-list.php?class=<?= $_GET["class"] ?>&p=<?= $pageClassCount ?>">
                                                        <i class="fa-solid fa-forward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                    <?php else : ?>
                                        <!-- 在一般狀態下，點選「全部」的分頁 -->
                                        <div class="me-3 d-flex">
                                            <?php if ($p > 1) : ?>
                                                <li class="page-item me-1">
                                                    <a class="page-link" href="product-list.php?p=1">
                                                        <i class="fa-solid fa-backward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if ($startPage > 1) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?p=<?= max(1, $p - 5) ?>">
                                                        <i class="fa-solid fa-angles-left fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                            <li class="page-item <?php if ($i == $p) echo "active"; ?>">
                                                <a class="page-link" href="product-list.php?p=<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>

                                        <div class="ms-3 d-flex">
                                            <?php if ($endPage < $pageCount) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="product-list.php?p=<?= min($pageCount, $p + 5) ?>">
                                                        <i class="fa-solid fa-angles-right fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($p < $pageCount) : ?>
                                                <li class="page-item ms-1">
                                                    <a class="page-link" href="product-list.php?p=<?= $pageCount ?>">
                                                        <i class="fa-solid fa-forward-fast fa-fw"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                    <!-- 如果都沒有商品的話會顯示 :  -->
                <?php else : ?>
                    <div class="">
                        <a class="btn btn-primary my-3 btn-index-yu" href="product-list.php">
                            <i class="fa-solid fa-arrow-left fa-fw"></i> 返回
                        </a>
                    </div>
                    <h5 class="text-secondary mt-5 mb-5">~ 尚無商品 ~</h5>
                <?php endif; ?>





                <!-- 頁尾 -->
                <footer class="footer py-4  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    棒球好玩家
                                </div>
                            </div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </main>

    <!-- 右下設定 -->
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">更改UI</h5>
                    <p>請選擇喜愛的配色</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include("../assets/js/js_yu.php");
    ?>

</body>

</html>