<?php
	require_once "../../include.php";
	if(empty($_POST['uname'])||empty($_POST['utel'])){
		header("Location: ../index.php");
		exit;
	}
	$sql="select * from user where utel={$_POST['utel']}";
	$arr=fetchOne($link,$sql);
	if($arr){
		if($arr['uname']==$_POST['uname']){
			$_SESSION['userid']=$arr['uid'];
			$statu=true;
			$msg="验证成功";
		}else{
			$statu=false;
			$msg="姓名和手机号不匹配";
		}
	}else{
		$sql="insert into user(uname,utel)values(\"{$_POST['uname']}\",\"{$_POST['utel']}\");";
		mysqli_query($link,$sql);
		$_SESSION['userid']=mysqli_insert_id($link);
		$statu=true;
		$msg="数据录入成功";
	}
	echo "{\"statu\":$statu,\"msg\":\"$msg\"}"; 

