<?php
	require_once '../../include.php';
	if(empty($_POST['username'])||empty($_POST['userpw'])){
		header ("Location: ../list.php");
		exit;
	}
	$username=$_POST['username'];
	$userpw=MD5($_POST['userpw']);
	$result = checkRepairer($link,$username,$userpw);
	switch ($result) {
		case 1:
			echo '{"statu":"1","message":"登陆成功"}';
			break;
		case 0:
			echo '{"statu":"0","message":"密码错误"}';
			break;
		case -1:
			echo '{"statu":"-1","message":"不存在该用户"}';
			break;
	}
