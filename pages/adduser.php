<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <!-- 網頁favcon -->
  <link rel="icon" type="image/png" href="../assets/img/694606.png">
  <title>
    會員註冊
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
            <button class="nav-link text-white accordion-button collapsed active bg-gradient-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
            <button class="nav-link text-white accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">會員管理</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">會員註冊</h6>
        </nav>
      </div>
    </nav>
    <div class="container">
      <div>
        <h2 class="d-flex justify-content-center
    align-items-center">會員註冊</hㄉ>

      </div>
      <div class="row">
        <div class="col-lg col-md-8">
          <form action="doAddUser.php" method="post" enctype="multipart/form-data">



            <div class="mb-3">
              <label for="form-label">大頭貼</label>
              <input type="file" class="form-control" name="photo">
            </div>
            <label for="form-label">名字</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label for="form-label">信箱</label>
              <input type="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$"/ class="form-control" name="account">
            </div>
            <div class="mb-3">
              <label for="form-label">密碼</label>
              <input type="txet"  required="required" pattern="^(?=.*[a-zA-Z])(?=.*[0-9]).{6,}$"/ class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label for="form-label">確認密碼</label>
              <input type="txet" class="form-control" name="repassword">
            </div>
            <div class="mb-3">
              <label for="form-label">生日</label>
              <input type="date" class="form-control" name="birthday">
            </div> 
            <div class="mb-3">
              <label for="form-label">電話</label>
              <input type="text" required="required" maxlength="11" pattern="09\d{2}\d{6}"/ class="form-control" name="phone">
            </div>
            <div class="mb-3">
              <label for="form-label">性別</label>
              <select id="gender" name="gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="form-label">住址</label>
              <input type="text" class="form-control" name="address">
            </div>
            <div class="text-center mb-5">
              <button class="btn btn-primary" type="submit">送出</button>
            </div>

        </div>
        </form>
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
</body>

</html>