<?php
include('./base.php');
$user = $Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($user)){
    alert('帳號或密碼錯誤');
    header("refresh:0;url=../index.php");
}else{
    $_SESSION['admin'] = $_POST['acc'];
    to('../back.php');
}
?>