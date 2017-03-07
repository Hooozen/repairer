<?php
require_once "../include.php";
isLogin();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="styleSheet" href="../style/common.css">
	<title>修改密码</title>
	<style>
	.content {
		margin-top: 45px;
	}
	table {
		border-collapse: collapse;
		border-top: 1px solid #eee;
		color: #444;
		font-size: 15px;
		width: 100%;
	}
	tr {
		border-bottom: 1px solid #eee;
		line-height: 35px;
	}
	td:nth-child(odd) {
		color: #888;
		padding: 0 10px;
		text-align: left;
		width: 100px;
	}
	input {
		color: #666;
		font-size: 15px;
		letter-spacing: 1px;
		line-height: 35px;
		padding: 0;
	}
	#saveBtn {
		background: #40afd2;
		border: none;
		border-radius: 3px;
		box-shadow: 1px 1px 5px rgba(0,0,0,0.2);
		color: #fff;
		font-size: 16px;
		display: block;
		margin: 20px auto;
		outline: none;
		padding: 5px 0;
		width: 100px;
	}

	</style>
</head>
<body>
	<div class="header">
		<div class="back-btn" id="backBtn">
			<i class="fa fa-angle-left"></i>
		</div>
		修改密码
	</div>
	<div class="content">
	<table>
		<tr><td>旧密码</td><td><input type="password" id="passwd" placeholder="登录密码"></td></tr>
		<tr><td>新密码</td><td><input type="password" id="newpw" placeholder="6-16个字符" ></td></tr>
		<tr><td>确认密码</td><td><input type="password" id="rppw" placeholder="重复新密码"></td></tr>
	</table>
	<button id="saveBtn">保存</button>
	</div>
</body>
<script src="../script/common.js"></script>
<script>
window.onload=function(){
	$('saveBtn').onclick=function(){
		var passwd=$('passwd').value;
		var newpw=$('newpw').value;
		var rppw=$('rppw').value;
		if(passwd==""){
			noticeDialogFn("请输入密码","30%");
		}else if(rppw!=newpw){
			noticeDialogFn("确认密码不一致");
		}else if(newpw.length<6||newpw.length>16){
			noticeDialogFn("新密码长度不合适","30%");
		}else{
			var sData="pw="+passwd+"&npw="+newpw;
			asynSubmit(sData,"resource/resetpw.php","POST",function(rData){
				if(rData.statu){
					confDialog("修改成功，请重新登录","确定");
					$('conf-y').onclick=function(){
						window.location="login.php";
					}
				}else{
					noticeDialogFn(rData.msg);
				}
			});
		}
	}
	$('backBtn').onclick=function(){
		history.go(-1);
	}
}
</script>
</html>
