<?php
require_once'../../include.php';
if(empty($_POST['lid'])||empty($_POST['statu'])){
	header("Location: ../list.php");
	exit;
}
$lid=$_POST['lid'];
$lstate=$_POST['statu'];
if($lstate=='1'){
	$sql="update list set lstate='1',lrid={$_SESSION['rid']},lotime=".time()." where lid=$lid";
	$sql2="update repairer set rtimes=rtimes+1 where rid={$_SESSION['rid']}";
	mysqli_query($link,$sql2);
}else{
	$sql="update list set lstate='2',letime=".time()." where lid=$lid";
}
if(mysqli_query($link,$sql)){
	echo '{"statu":"1","message":"操作成功,跳转中"}';
}else{
	echo '{"statu":"0","message":"操作失败，请重试"}';
}
