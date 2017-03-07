<?php
require_once "../../include.php";
if(empty($_POST['stunum'])||empty($_POST['name'])||empty($_POST['tel'])||empty($_POST['apart'])){
	header("Location: ../index.php");
	exit;
}

$stunum = $_POST['stunum'];
$name   = $_POST['name'];
$tel    = $_POST['tel'];
$apart  = $_POST['apart'];

$rdata = '{"statu":false,"msg":"未知错误，请查看注册说明"}';
$sql = "update user set uname=\"$name\",ustunum=\"$stunum\",uapart=$apart where uid = {$_SESSION['userid']}";
if(mysqli_query($link,$sql)){
	$rdata = '{"statu":true,"msg":"数据已更新"}';
}
echo $rdata;

