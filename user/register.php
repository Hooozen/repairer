<?php
	require_once "../include.php";
	if(isReg($link)||!userStatu($link)){
		header("Location:index.php");
		exit();
	}
	$sql="select * from user where uid={$_SESSION['userid']}";
	$arr=fetchOne($link,$sql);
?>
<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="styleSheet" type="text/css" href="./style/common.css">
<title>完善信息-信息科协</title>
<style>
html,body {
	margin: 0;
	padding: 0;
}
.title {
	background: url(./images/title.jpg) center top no-repeat;
	background-size: cover;
	box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	height: 180px;
}
.content {
	border-radius: 5px;
	box-shadow: 1px 1px 10px rgba(0,0,0,0.2);
	font-size: 14px;
	margin: 10px auto;
	padding: 10px;
	width: 80%;
}
.content label {
	color: #ffb2bf;
	display: block;
	line-height: 14px;
	padding-left: 2px;
	position: relative;
	z-index: 999;
}
.labelUp{
	animation: labelMvU 0.2s;
	font-size: 12px;
	top: 0;
}
.labelDown{
	animation: labelMvD 0.2s;
	font-size: 14px;
	top: 22px;
}
@keyframes labelMvU {
	from {
		font-size: 14px;
		top: 22px;
	} to {
		font-size: 12px;
		top: 0;
	}
}
@keyframes labelMvD {
	from {
		font-size: 12px;
		top: 0;
	} to {
		font-size: 14px;
		top: 22px;
	}
}
.content input {
	border: none;
	color: #444;
	display: block;
	font-size: 16px;
	line-height: 30px;
	outline: none;
	padding: 0 2px;
	vertical-align: text-bottom;
	width: 100%;
}
.ipt-box {
	border-bottom: 1px solid #ffeaee;
	margin-top: 10px;
}
select {
	background: none;
	border: none;
	color: #444;
	height: 30px;
	font-size: 16px;
	outline: none;
	overflow: hidden;
	padding: 0;
	text-align: left;
	width: 100%;
}
option {
	padding: 0;
	width: 100px;
}
#subBtn {
	background: #40afd2;
	border: none;
	border-radius: 5px;
	box-shadow: 1px 1px 10px rgba(0,0,0,0.2);
	color: #fff;
	display: block;
	font-size: 18px;
	line-height: 30px;
	margin: 20px auto;
	outline: none;
	padding: 10px 50px;
	width: 80%;
}
#direction {
	background: #fff;
	border-top: 3px solid #40afd2;
	border-radius: 5px;
	box-shadow: 1px 1px 5px rgba(0,0,0,0.2);
	display: none;
	height: 70%;
	left: 8%;
	overflow: auto;
	padding: 2%;
	position: fixed;
	top: 10%;
	width: 80%;
	z-index: 1100;
}

</style>
<head>
<body>
<div id="black-bg"></div>
<div id="direction">
	<h2>注册说明</h2>
	<p>请准确填写个人信息，这将是我们能联系你并为你提供服务的前提。</p>
	<p>若系统提示<span class="red">"未知错误"</span>或<span class="red">"手机号已被注册"</span>，请重新从信息科协公众号(chdxxkx)进入本系统，或联系Hozen@live.com。

	<h2>信息科协</h2>
	<p>信息科协努力做优秀的学生组织，如有任何问题或意见请不吝赐教!</p>
	<p>信息科协交流群:328037390<br>
	信息科协办公室:明远二区2501<br></p>

	<h2>其他</h2>
	<p>本系统自费开发，服务器配置有限，请不要对本系统进行破坏性实验...<br>
	如发现任何漏洞请务必联系我，不胜感激！</p>
	<p>开发者: Hozen@live.com</p>
	<p class="gray">别拉了，没了！</p>
</div>

<div class="title">
</div>
<div id="infoCard" class="content">
	<div class="ipt-box">
		<label for="tel" class="labelDown">手机号</label>
		<input id="tel" type="tel" maxlength="11" readonly="true" <?php echo "value=\"{$arr['utel']}\"";?>>
	</div>
		<div class="ipt-box">
		<label for="name" class="labelDown">姓名(2-6个汉字)</label>
		<input id="name" type="text" maxlength="6">
	</div>
	<div class="ipt-box">
		<label for="stunum" class="labelDown">学号(用户标识,请准确填写)</label>
		<input id="stunum" type="tel" maxlength="12">
	</div>
	<div class="ipt-box">
		<label for="apart" class="labelDown">公寓楼</label>
		<select id="apart">
			<option></option><option>1 号</option><option>2 号</option><option>3 号</option><option>4 号</option><option>5 号</option><option>6 号</option><option>7 号</option><option>8 号</option><option>9 号</option><option>10号</option><option>11号</option><option>12号</option><option>13号</option><option>14号</option><option>15号</option><option>16号</option><option>17号</option><option>18号</option>
		</select>
	</div>
</div>
<button id="subBtn">提 交</button>
<span id="direct-btn">查看说明</span>
</body>
<script type="text/javascript" src="./script/common.js"></script>
<script>
function errShow(){
	var oDiv= $('infoCard').getElementsByTagName('div');
	var oActive=document.activeElement;
	for(var i=0;i<oDiv.length;i++){
		var oInput = oDiv[i].childNodes[3];
		if(oInput.value||oInput==document.activeElement){
			oDiv[i].childNodes[1].className="labelUp";
		}else{
			oDiv[i].childNodes[1].className="labelDown";
		}
	}
}

function chkErr(){
	var isRight=true;
	if(chkStunum($('stunum').value)){
		$('stunum').parentNode.style.borderColor="#eee";
		$('stunum').parentNode.childNodes[1].style.color="#aaa";
	}else{
		isRight=false;
		$('stunum').parentNode.style.borderColor="#ffb2bf";
		$('stunum').parentNode.childNodes[1].style.color="#ffb2bf";
	}
	if(chkName($('name').value)){
		$('name').parentNode.style.borderColor="#eee";
		$('name').parentNode.childNodes[1].style.color="#aaa";
	}else{
		isRight=false;
		$('name').parentNode.style.borderColor="#ffb2bf";
		$('name').parentNode.childNodes[1].style.color="#ffb2bf";
	}
	if(chkTel($('tel').value)){
		$('tel').parentNode.style.borderColor="#eee";
		$('tel').parentNode.childNodes[1].style.color="#aaa";
	}else{	
		isRight=false;
		$('tel').parentNode.style.borderColor="#ffb2bf";
		$('tel').parentNode.childNodes[1].style.color="#ffb2bf";
	}
	if($('apart').value){
		$('apart').parentNode.style.borderColor="#eee";
		$('apart').parentNode.childNodes[1].style.color="#aaa";
	}else{
		isRight=false;
		$('apart').parentNode.style.borderColor="#ffb2bf";
		$('apart').parentNode.childNodes[1].style.color="#ffb2bf";
	}
	return isRight;
}
window.onload=function(){
	chkErr();
	errShow();
	$('direct-btn').onclick=function(){
		$('direction').style.display="block";
		$('black-bg').style.display="block";
		event.stopPropagation();
	}
	document.onclick=function(){
		errShow();
		chkErr();
		$('direction').style.display="none";
		$('black-bg').style.display="none";
	}
	document.onkeyup=function(){
		errShow();
		chkErr();
	}
	$('apart').onchange=function(){
		chkErr();		
	}

	$('subBtn').onclick=function(){
		if(chkErr()){
			var apart=$('apart').value;
			apart = apart.substring(0,apart.length-1);
			sData="stunum="+$('stunum').value+"&name="+$('name').value+"&tel="+$('tel').value+"&apart="+apart;
			asynSubmit(sData,"./resource/doReg.php","POST",function(rData){
				if(rData.statu){
					loadingDialogFn("注册成功，跳转中...");
					window.location="index.php";
				}else{
					noticeDialogFn(rData.msg,"40%");
				}
			});
		}
	}

}

</script>
<html>
