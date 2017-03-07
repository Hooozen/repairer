<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="../style/common.css"/>
	<meta charset="UTF-8">
	<title>登陆-信息科协</title>
	<style type="text/css">
	html,body {
		margin: 0;
		padding: 0;
	}
	body{
		background: #e5ecff;
	}
	.logo{
		width: 80px;
		height: 88px;
		margin: 30% auto 0;
		background: url(./images/logo.png) top left no-repeat;
		background-size: 100%
	}
	.login-wrap{
		width: 70%;
		margin: 30px auto 15px;
		text-align: center;
		border-radius: 3px;
		overflow: hidden;
	}
	input{
		width: 100%;
		border: none;
		outline: none;
		height: 50px;
		padding-left: 5px;
	}
	.hr{
		height: 1px;
		background: #e5ecff;
	}
	input::-webkit-input-placeholder{
		color: #aaa;
		font-size: 14px;
	}
	input::-moz-input-placeholder{
		color: black;
		font-size: 14px;
	}
	.button{
		display: block;
		width: 70%;
		margin: 0 auto;
		outline: none;
		border: none;
		height: 40px;
		background: #0973aa;
		border-radius: 3px;
		color: #fff;
		font-size: 18px;
	}

	</style>
</head>
<body>
	<div class="logo"></div>
	<div class="login-wrap">
		<input id="username" name="username" type="text" maxlength="5" placeholder="登录名"/>
		<div class="hr"></div>
		<input id="userpw" name="userpw" type="password" maxlength="16" placeholder="请输入密码"/>
	</div>
	<button id="submit" class="button">登陆</button>
</body>
<script type="text/javascript" src="../script/common.js"></script>
<script type="text/javascript">
	var submitBtn=$("submit");
	var userName=$("username");
	var userPw=$("userpw");
	submitBtn.onclick=function(){
		if(userName.value==""){
			noticeDialogFn("请填写登录名","10%",1);
		}else if(userPw.value==""){
			noticeDialogFn("请填写密码","10%",1);
		}else{
			var sdata="username="+userName.value+"&userpw="+userPw.value;
			asynSubmit(sdata,"./resource/dologin.php","POST",function(data){
				if(data.statu=="1"){
					window.location="list.php";
				}else{
					noticeDialogFn(data.message,"10%",1);
				}
			});
		}
	}
</script>
</html>
