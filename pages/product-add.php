<?php
session_start();
require_once("../db_connect.php");

$sqlInfo = "SELECT * FROM `product_info`";
$resultInfo = $conn->query($sqlInfo);


$sql = "SELECT * FROM product ORDER BY id ASC";
$result = $conn->query($sql);

$rowCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- 網頁favcon -->
    <link rel="icon" type="image/png" href="../assets/img/694606.png">
    <title>新增商品</title>
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
                    <h6 class="font-weight-bolder mb-0">新增商品</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- 新增商品頁面 -->
        <div class="container">
            <h2 class="text-center my-3">新增商品</h2>

            <a class="btn-back btn-warning my-2 ms-5" href="product-list.php">
                <i class="fa-solid fa-share-from-square fa-flip-horizontal"></i> 返回商品列表
            </a>

            </a>
            <div class="row">

                <div class="col-3">
                    <div class="my-4">
                        <div id="imagePreview" class="ratio ratio-1x1 add-table-img mx-auto">
                        </div>
                        <h6 class="text-center add-table-img mx-auto mt-2">預覽圖片</h6>
                    </div>
                </div>

                <div class="col-9">
                    <form class="add-form-w" action="doAddProduct.php" method="post" enctype="multipart/form-data">

                        <table class="table-bordered table-bs5 my-4">
                            <tr>
                                <th class="add-table-secondary">商品名稱 : </th>
                                <td><input type="text" class="form-control-bs5" id="productName" name="productName" placeholder="請輸入商品名稱" required></td>
                            </tr>

                            <tr>
                                <th class="add-table-secondary">商品類別 : </th>
                                <td>
                                    <div class="page-span">- 請先選擇<span>類別</span> -</div>
                                    <div class="row">
                                        <div class="col">
                                            <select name="productClass" id="setClass" class="form-select-bs5" aria-label="Default select example" required>
                                                <option value="" selected>請選擇類別</option>
                                                <?php

                                                while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                                                    $classValue = $rowInfo["class"];

                                                    echo "<option value=\"$classValue\">$classValue</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="productOther" id="setOther" class="form-select-bs5" aria-label="Default select example" required>
                                                <option selected>請選擇子類別</option>
                                            </select>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th class="add-table-secondary">商品規格 : </th>
                                <td>

                                    <div class="row">
                                        <div class="col">
                                            <select name="productColor[]" id="setColor" class="form-select-bs5" aria-label="Default select example" required multiple>
                                                <option selected>請選擇顏色</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="productSize[]" id="setSize" class="form-select-bs5" aria-label="Default select example" required multiple>
                                                <option selected>請選擇尺寸</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="page-span mt-2">- 顏色 / 尺寸 &nbsp;可長按 ctrl 或 shift 作多選 -</div>
                                </td>
                            </tr>

                            <tr>
                                <th class="add-table-secondary">商品品牌 : </th>
                                <td>
                                    <select name="productBrand" id="setBrand" class="form-select-bs5" aria-label="Default select example" required>
                                        <option selected>請選擇品牌</option>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="add-table-secondary">商品價格 : </th>
                                <td><input name="productPrice" type="text" class="form-control-bs5" id="productPrice" name="productPrice" placeholder="請輸入商品價格" required></td>
                            </tr>
                            <tr>
                                <th class="add-table-secondary">商品描述 : </th>
                                <td>
                                    <div class="form-floating">
                                        <textarea name="productDescription" class="form-control-bs5  add-text-area" placeholder="請輸入商品描述" id="floatingTextarea2"></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="add-table-secondary">上傳商品圖片 : </th>
                                <td>
                                    <div class="input-group">

                                        <input name="productImage" type="file" class="form-control-bs5" id="inputGroupFile01" onchange="previewImage()" required>
                                    </div>
                                </td>
                            </tr>

                        </table>
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                送出
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <div class="container-fluid py-4">
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

    <!-- 其他功能列 -->
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



    <?php
    include("../assets/js/add_js_yu.php");
    ?>

</body>

</html>