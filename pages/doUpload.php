<?php

if(!isset($_POST["photo"])){
  echo"請循正常管道";
  exit;
}



$file=$_FILES["photo"];
var_dump($file);