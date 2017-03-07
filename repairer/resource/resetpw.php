<?php
require_once "../../include.php";
if(empty($_POST['pw'])||empty($_POST['npw'])){
	header("Location: ../list.php");
	exit;
}
$rid=$_SESSION['rid'];
$sql="select rpw from repairer where rid = $rid";
$arr=fetchOne($link,$sql);
if($arr['rpw']==MD5($_POST['pw'])){
	$sql="update repairer set rpw='".MD5($_POST['npw'])."' where rid = $rid";
	if(mysqli_query($link,$sql)){
		$rData='{"statu":1,"msg":"密码修改成功"}';
	}else{
		$rData='{"statu":0,"msg":"修改失败，请刷新重试"}';
	}
}else{
	$rData='{"statu":0,"msg":"密码错误"}';
}
echo $rData;
