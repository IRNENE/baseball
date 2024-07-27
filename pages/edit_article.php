<?php


if (!isset($_GET["id"])) {
  $id = 0;
} else {
  $id = $_GET["id"];
}
require_once("./db_connect.php");

$sql = "SELECT * FROM article WHERE id=$id AND valid=1";
$result = $conn->query($sql);

$rowCount = $result->num_rows;

if ($rowCount != 0) {
  $row = $result->fetch_assoc();
}


?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <!-- 網頁favcon -->
  <link rel="icon" type="image/png" href="../assets/img/694606.png">
  <title>
    編輯文章頁
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="../assets/css/ader.css" rel="stylesheet" />
  <?php include("../assets/css/css_lin.php") ?>
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
            <button class="nav-link text-white accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
            <button class="nav-link text-white accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
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
            <button class="nav-link text-white accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
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
            <button class="nav-link text-white accordion-button collapsed active bg-gradient-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
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
        <!-- 麵包屑 -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="./firststage.php">後臺管理</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">文章管理</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">編輯文章</h6>
        </nav>
      </div>
    </nav>



    <div class="container">
      <h2 class="text-center">文章修改頁</h2>
      <?php if ($rowCount == 0) : ?>
        文章不存在
      <?php else :

      ?>
        <div class="py-2">
          <a class="btn btn-primary" href="article.php?id=<?= $row["id"] ?>" role="button"><i class="fa-solid fa-chevron-left"></i> 回文章列表</a>
        </div>

        <form action="updateEdit_article.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <table class="table table-bordered ">

            <tr>
              <th>文章標題</th>
              <td><input type="text" class="form-control" value="<?= $row["title"] ?>" name="title"></td>
            </tr>
            <tr>
              <th>文章圖片</th>
              <td>
                <div class="mb-1 mt-2">目前圖片</div>
                <img class="" src="../assets/img/article_img/<?= $row["photo"] ?>" alt="" width="250" height="auto">
                <!-- <label for="formFileMultiple" class="form-label"></label> -->

                <!-- <input class="form-control" type="file" id="formFileMultiple" name="photo" multiple > -->


                <div class="mb-1 mt-2">預覽圖片</div>
                <form action="/somewhere/to/upload" enctype="multipart/form-data">
                  <img class="" id="preview_progressbarTW_img" src="../assets/img/article_img/uploadimg2.png" width="250" height="auto" />
                  <input class="form-control" type="file" id="formFileMultiple" name="photo" multiple onchange="readURL(this)" targetID="preview_progressbarTW_img" accept="image/gif, image/jpeg, image/png" />

                </form>


              </td>
            </tr>
            <tr>
              <th>文章內容</th>
              <td style="white-space: normal;"><textarea id="editor" name="description" class="form-control" aria-label="With textarea">
                        <?= $row["description"] ?>
                        </textarea></td>
              <script>
                ClassicEditor
                  .create(document.querySelector('#editor'))
                  .then(editor => {
                    console.log(editor);
                  })
                  .catch(error => {
                    console.error(error);
                  });
              </script>
            </tr>
            <tr>
              <th>文章類型</th>
              <td>
                <div class="form-check">
                  <input class="form-check-input masterCheckbox" type="checkbox" value="打擊" id="flexCheckDefault6" name="type[]" <?php
                                                                                                                                  $types = explode(",", $row["type"]);  //假設 type 是以逗號分隔的字串,將其轉換為陣列
                                                                                                                                  foreach ($types as $type) {
                                                                                                                                    if ($type == "打擊") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    打擊
                  </label>
                  <input class="form-check-input masterCheckbox" type="checkbox" value="投球" id="flexCheckDefault7" name="type[]" <?php
                                                                                                                                  $types = explode(",", $row["type"]);
                                                                                                                                  foreach ($types as $type) {
                                                                                                                                    if ($type == "投球") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    投球
                  </label>
                  <input class="form-check-input masterCheckbox" type="checkbox" value="守備" id="flexCheckDefault8" name="type[]" <?php
                                                                                                                                  $types = explode(",", $row["type"]);
                                                                                                                                  foreach ($types as $type) {
                                                                                                                                    if ($type == "守備") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    守備
                  </label>
                  <input class="form-check-input masterCheckbox" type="checkbox" value="體能" id="flexCheckDefault9" name="type[]" <?php
                                                                                                                                  $types = explode(",", $row["type"]); //假設 type 是以逗號分隔的字串,將其轉換為陣列
                                                                                                                                  foreach ($types as $type) {
                                                                                                                                    if ($type == "體能") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    體能
                  </label>
                  <input class="form-check-input masterCheckbox" type="checkbox" value="知識" id="flexCheckDefault10" name="type[]" <?php
                                                                                                                                  $types = explode(",", $row["type"]);
                                                                                                                                  foreach ($types as $type) {
                                                                                                                                    if ($type == "知識") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    知識
                  </label>
                </div>

                <!-- 改type_id-->
                <div class="form-check childCheckbox2">
                  <input class="form-check-input childCheckbox" type="checkbox" value="1" id="flexCheckDefault1" name="type_id[]" <?php
                                                                                                                                  $types_id = explode(",", $row["type_id"]);  //假設 type 是以逗號分隔的字串,將其轉換為陣列
                                                                                                                                  foreach ($types_id as $type_id) {
                                                                                                                                    if ($type_id == "1") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    打擊
                  </label>

                  <input class="form-check-input childCheckbox" type="checkbox" value="2" id="flexCheckDefault2" name="type_id[]" <?php
                                                                                                                                  $types_id = explode(",", $row["type_id"]);
                                                                                                                                  foreach ($types_id as $type_id) {
                                                                                                                                    if ($type_id == "2") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    投球
                  </label>
                  <input class="form-check-input childCheckbox" type="checkbox" value="3" id="flexCheckDefault3" name="type_id[]" <?php
                                                                                                                                  $types_id = explode(",", $row["type_id"]);
                                                                                                                                  foreach ($types_id as $type_id) {
                                                                                                                                    if ($type_id == "3") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    守備
                  </label>

                  <input class="form-check-input childCheckbox" type="checkbox" value="4" id="flexCheckDefault4" name="type_id[]" <?php
                                                                                                                                  $types_id = explode(",", $row["type_id"]); //假設 type 是以逗號分隔的字串,將其轉換為陣列
                                                                                                                                  foreach ($types_id as $type_id) {
                                                                                                                                    if ($type_id == "4") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    體能
                  </label>

                  <input class="form-check-input childCheckbox" type="checkbox" value="5" id="flexCheckDefault5" name="type_id[]" <?php
                                                                                                                                  $types_id = explode(",", $row["type_id"]);
                                                                                                                                  foreach ($types_id as $type_id) {
                                                                                                                                    if ($type_id == "5") {
                                                                                                                                      echo "checked";
                                                                                                                                    }
                                                                                                                                  }
                                                                                                                                  ?>>

                  <label class="form-check-label" for="flexCheckDefault">
                    知識
                  </label>
                </div>

                <!-- <select class="form-select" name="type_id[]" id="" multiple="multiple">
                  <option value="">請選擇類型</option>
                  <option value="1">打擊</option>
                  <option value="2">投球</option>
                  <option value="3">守備</option>
                  <option value="4">體能</option>
                  <option value="5">知識</option>
                </select> -->
                <!-- <select class="form-select" name="type" id="">
                            <option value="">請選擇類型</option>
                            <option value="打擊">打擊</option>
                            <option value="投球">投球</option>
                            <option value="守備">守備</option>
                            <option value="體能">體能</option>
                            <option value="知識">知識</option>
                        </select> -->
              </td>
            </tr>
            <tr>
              <th>建立時間</th>
              <td><input type="datetime" class="form-control" value="<?= $row["created_at"] ?>" name="created_at"></td>
            </tr>

          </table>
          <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary me-5">
              儲存
            </button>
            <a href="article.php" class="btn btn-primary me-5" role="button">取消</a>
            <!-- <button type="button" class="btn btn-primary">
                        取消
                    </button> -->
            <button data-bs-toggle="modal" data-bs-target="#confrimModal" class="btn btn-danger me-5" type="button">
              刪除
            </button>





          </div>
        </form>



      <?php endif; ?>
      <!-- 跳出刪除確認 -->
      <div class="modal fade" id="confrimModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">刪除文章</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              確認刪除?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
              <a type="button" class="btn btn-danger" href="articlesoftdelete.php?id=<?= $row["id"] ?>">確認
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>




















    <!-- End Navbar -->
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
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <!-- <script src="../assets/js/core/bootstrap.min.js"></script> -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php include("./js.php") ?>
  <?php include("../assets/js/js_lin.php") ?>
</body>

</html>