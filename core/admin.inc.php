<?php
/**
	登录验证
	登陆成功返回1；
	密码错误返回0；
	不存在该用户返回-1；
*/
function checkRepairer($link,$username,$userpw){
	$sql="SELECT * FROM repairer WHERE rname='".$username."'";
	$res=fetchOne($link,$sql,MYSQLI_ASSOC);
	if($res){
		if($res['rpw']==$userpw){
			$_SESSION['rid']=$res['rid'];
			$_SESSION['rname']=$res['rname'];
			return 1;
		}else{
			return 0;
		}		
	}else{
		return -1;
	}
}

function getlistinfo($link,$lid){
	$sql="SELECT * FROM list,user WHERE lid=$lid and luid=uid";
	$res=fetchOne($link,$sql);
	if($res['lstate']=='0'){
		return $res;
	}else{
		$sql="SELECT * FROM list,user,repairer WHERE lid=$lid and luid=uid and lrid=rid";
		return fetchOne($link,$sql);
	}
} 

function isLogin(){
	if(empty($_SESSION['rid'])){
		header('Location: login.php');
		exit;
	}
}
