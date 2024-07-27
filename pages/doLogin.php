<?php
session_start();

require_once("./db_connect.php");

if (!isset($_POST["account"])) {
  die("請循正常管道進入");
  exit;
}

$account = $_POST["account"];
$password = $_POST["password"];


if (empty($account)) {
  $_SESSION["error"]["account"] = "請填入帳號";
  header("location: login.php");
  exit;
}
if (empty($password)) {
  $_SESSION["error"]["password"] = "請填入密碼";
  header("location: login.php");
  exit;
}

$password = md5($password);
$sql = "SELECT * FROM user WHERE account='$account' AND password = '$password' AND valid=1";

$result = $conn->query($sql);



$userExist = $result->num_rows;

if ($userExist == 0) {
  $_SESSION["error"]["message"] = "帳號或密碼錯誤";
  if (isset($_SESSION["error"]["times"])) {
    $_SESSION["error"]["times"]++;
    $times = $_SESSION["error"]["times"];
  } else {
    $times = 1;
  }
  $_SESSION["error"]["times"] = $times;

  header("location: login.php");
} else {
  $row = $result->fetch_assoc();
  $_SESSION["user"] = [
    "account" => $row["account"],
    "name" => $row["name"],
    "phone" => $row["phone"]
  ];
  header("location: firststage.php");
}

$conn->close();
