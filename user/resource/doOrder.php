<?php
require_once '../../include.php';
if(!userStatu($link)){
	header("Location: index.php");
	exit();
}
$ldetail = $_POST["detail"];
$ldevice = $_POST['device'];
if($ldetail!=""&&$ldevice!=""){
	$list=array(
		"ldevice"=>$ldevice,
		"luid"=>$_SESSION['userid'],
		"ldetail"=>$ldetail,	
		"lstime"=>time(),
	);
	if(0==insert($link,"list",$list)){
		echo '{"statu":"0","message":"提交失败，请重试"}';
	}else{
		$sql="update user set utimes=utimes+1 where uid={$_SESSION['userid']};";
		if(mysqli_query($link,$sql)){
			echo '{"statu":"1","message":"预约成功,跳转中··"}';
		}
	}
}
