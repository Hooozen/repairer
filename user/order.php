<?php
require_once "../include.php";
if(!userStatu($link)){
	header("Location: index.php");
	exit;
}
$row = getuserinfo($link,@$_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="./style/common.css"/>
	<title>义诊预约-信息科协</title>
	<style type="text/css">
		html,body{position: relative; padding: 0; overflow: hidden}
		a {
			display: block;
		}
		.list-wrap{
			background: url(./images/listbg.jpg) top center no-repeat;
			background-size: 100%,auto; 
			box-shadow: 0 1px 5px rgba(0,0,0,0.2);
			margin: 40px auto 10px; 
			overflow: hidden;
			padding: 20px 0;
			width: 96%; 
		}
		.list{
			color: #64768e;
			font-size: 14px;
			margin: 40px auto 0;
			position: relative;
			width: 94%;
		}
		.list textarea{
			background: #fffefc;
			border-color: #a84807; 
			box-sizing: border-box;
			display: block;
			height: 120px;
			margin: 10px auto;
			outline: none;
			resize: none; 
			width: 100%; 
		}
		.fixed-font{
			color: #a84807;
		}
		select{
			border-color: #fff;
			background: #fffefc;
			color: #64768e;
		}
		option{
			border-color: #a84807;
		}
		button{
			outline:none;
			border: none;
			border-radius: 4px;
			display: block;
			width: 90%;
			margin: 20px auto;
			background: #40afd2;
			color: #fff;
			font-size: 20px;
			height: 40px;
			line-height: 40px;
		}
		.uinfo{
			margin: 10px;
			height: 20px;
			vertical-align: sub;
		}
		.telinp{
			width: 100px;
			border-bottom: 1px solid #ccc;
		}
		.wrap {
			display: flex;
			height: 100%;
			position: absolute;
			width: 100%;
		}
	</style>
</head>
<body>
	<ul id="nav" class="nav">
		<li><a href="index.php"><i class="fa fa-th-large"></i><br/>首页</a></li>
		<li class="selected"><i class="fa fa-pencil-square"></i><br/>预约</li>
		<li><a href="history.php"><i class="fa fa-history"></i><br/>历史</a></li>
		<li><a href="userinfo.php"><i class="fa fa-user-o"></i><br/>我的</a></li>
	</ul>
	<div class="list-wrap">
	<div class="list" id="list">
		<span class="fixed-font">预约人:</span><?php echo $row['uname']?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fixed-font">手机号:</span><?php echo $row['utel']?>
		<textarea id="textarea" placeholder="在这里填写故障详情"></textarea>
		<input id="desk-top" type="radio" name="device-type" value="台式机"/><label for="desk-top" class="fixed-font">台式机&nbsp;</label>
		<input id="laptop" type="radio" name="device-type" value="笔记本" checked="checked"/><label for="laptop" class="fixed-font">笔记本&nbsp;</label>
		<input id="other" type="radio" value="其他" name="device-type"/><label for="other" class="fixed-font">其他</label>
	</div>
	</div>
	<button id="submit">提交</button>
</body>
<script src="./script/common.js"></script>
<script>
<?php
if(!isReg($link)){
	echo "confDialog('请完善个人信息(￣▽￣)\"',' 哦.. ');
	if($('conf-y')){
		$('conf-y').onclick=function(){
			window.location='register.php';
		}
	}";
}
?>
	window.onload=function(){
		hiddenNav();
		submit.onclick=function(){
			var detail=$('textarea').value;
			var device=getRadioVal('device-type');
			if(detail==""){
				noticeDialogFn("请填写详情描述","10%")
			}else{
				if($('loadingDia')){
					noticeDialogFn("请勿重复操作","10%");
				}else{
					loadingDialogFn(1,"提交中","10%");
					data="detail="+detail+"&device="+device;
					asynSubmit(data,"resource/doOrder.php","POST",function(rData){
						if(rData.statu=="1"){
							$('diaText').innerText=rData.message;
							window.location="history.php";
						}else{
							loadingDialogFn(0);
							noticeDialogFn(rData.message,"10%");
						}
					});
				}	
			}
		}
	}
</script>
</html>
