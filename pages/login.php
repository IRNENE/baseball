<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>後台登入</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- 網頁favcon -->
    <link rel="icon" type="image/png" href="../assets/img/694606.png">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="../assets/css/ader.css" rel="stylesheet" />
    <style>
        body {
            background: url(../assets/img/login1.jpg) center center/cover;
        }

        .logo {
            width: 100px;
        }

        form {
            background-color: rgba(158, 207, 250, 0.3);
            padding: 10px;
        }

        .sign-in-panel {
            .form-control {
                position: relative;

                &:focus {
                    z-index: 1;
                }
            }
        }

        .input-top .form-control {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom: 0;
        }

        .input-bottom .form-control {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="sing-in-panel">
            <?php if (isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"] > 5) : ?>
                <h1 class="text-center">嘗試登入次數過多</h1>
            <?php else : ?>
                <form action="doLogin.php" method="post">
                    <h2 class="pt-3 mb-3 text-center">登入</h2>
                    <div class="mb-3">
                        <label for="form-label">信箱</label>
                        <input type="account" ruquired="ruquired" class="form-control" name="account">
                    </div>
                    <?php if (isset($_SESSION["error"]["account"])) : ?>
                        <div>
                            <div class="text-danger"><?= $_SESSION["error"]["account"] ?></div>
                        </div>
                    <?php endif;
                    unset($_SESSION["error"]["account"]); ?>
                    <div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">密碼</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <?php if (isset($_SESSION["error"]["password"])) : ?>
                        <div>
                            <div class="text-danger"><?= $_SESSION["error"]["password"] ?></div>
                        </div>
                    <?php endif;
                    unset($_SESSION["error"]["password"]); ?>

                    <?php if (isset($_SESSION["error"]["message"]) && !isset($_POST["account"]) && !isset($_POST["password"])) : ?>
                        <div class="mb-3">
                            <div class="mb-3">
                                <div class="text-danger"><?= $_SESSION["error"]["message"] ?></div>
                            </div>
                        <?php endif;
                    unset($_SESSION["error"]["message"]); ?>

                        <div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">登入</button>
                        </div>
                </form>
            <?php endif; ?>
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