<?php
require_once "../include.php";
isLogin();
$sql="SELECT * FROM repairer WHERE rid = {$_SESSION['rid']}";
$res=mysqli_query($link,$sql);
$info=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="styleSheet" type="text/css" href="../style/common.css">
<title>个人信息</title> <style> body {
    background: #fcfcfc;
  }
  .info-card {
	  background: #fff;
	  border-top: 1px solid #eee;
   	  box-shadow: 0 0 5px 3px rgba(0,0,0,0.1);
	  font-size: 14px;
	  margin: 10px auto 0;
	  overflow: hidden;
	  width: 92%;
  }
  .info-card i {
	  font-size: 18px;
	  color: #40afd2;
  }
  .input-read{
	  color: #666;
	  max-width: 84%;
	  padding:0 5px;
  } 
  .input-write{
	  border-bottom: 1px solid #eee;
	  color: #444;
	  max-width: 84%;
	  padding:0 5px;
  }
  .logout {
	  color: #fff;
	  background: #de4343;
	  border: none;
	  border-radius: 2px;
	  display: block;
	  height: 40px;
	  margin: 10px auto;
	  outline: none;
	  text-align: center;
	  width: 200px;
  }
  table {
    border-collapse: collapse;
	margin: 10px;
  }
  tr{
    line-height: 35px;
  }
  td:nth-child(1){
    width: 80px;
    color: #aaa;
  }
  td:nth-child(2){
    color: #666;
  }
  th {
	  color: #40afd2;
  }
  a {
	  display: block;
  }
  #reset {
	  color: #40afd2;
	  font-size: 14px;
	  margin: 0 auto;
	  text-align: center;
	  width: 80px;
  }

</style>
</head>
<body>
	<div class="header">个人信息</div>
	<ul id="nav" class="nav">
		<li><a href="list.php"><i class="fa fa-laptop"></i><br>列表</a></li>
		<li><a href="task.php"><i class="fa fa-clock-o"></i><br>任务</a></li>
		<li><a href="rank.php"><i class="fa fa-list-ol"></i><br>排行</a></li>
		<li class="selected"><i class="fa fa-user-o"></i><br>我的</li>
	</ul>
    <div style="height: 50px"></div>
    <div class="info-card">
		<table>
		<th>基本信息</th>
		<tr><td>姓名</td><td><?php echo $info['rname'];?></td></tr>
		<tr><td>入职年份</td><td><?php echo $info['ryear']?>年</td></tr>
		<tr><td>维修次数</td><td><?php echo $info['rtimes']?> 次</td></tr>
		</table>
    </div>
  <div class="info-card">
	<table>
	<th>其他信息</th>
	<tr><td>手机</td><td><input class="input-read" type="tel" <?php echo "value=\"{$info['rtel']}\""; ?>readonly="true"> <i id="edit-tel"  class="fa fa-pencil"></i></td></tr>
	<tr><td>QQ</td><td><input class="input-read" type="tel" <?php echo "value=\"{$info['rqq']}\""; ?>readonly="true"> <i id="edit-qq"  class="fa fa-pencil"></i></td></tr>
	<tr><td>签名</td><td><input id="inp-sign" class="input-read" type="text" <?php echo "value=\"{$info['rsign']}\""; ?>readonly="true"> <i id="edit-sign"  class="fa fa-pencil"></i></td></tr>
	</table>
  </div>
<button id="logout" class="logout">退出登录</button>
<a id="reset" href="resetpw.php">修改密码</a>
</body>
<script type="text/javascript" src="../script/common.js"></script>
<script>
function WRsw(obj,type){
	if(obj.className=="fa fa-pencil"){
		obj.className="fa fa-save";
		oInput=obj.parentNode.firstChild;
		oInput.readOnly=false;
		oInput.className="input-write";
		oInput.focus();
		oInput.setSelectionRange(0,oInput.value.length);
	}else{
		oInput=obj.parentNode.firstChild;
		switch (type){
			case "tel":
				if(checkTel(oInput.value)){
					data="tel="+oInput.value;
				}else{
					err="请检查手机号";
				}
				break;
			case "qq":
				if(oInput.value.length<=11&&oInput.value.length>=5){
					data="qq="+oInput.value;
				}else{
					err="请输入5-11位QQ号"
				}
				break;
			case "sign":
				if(oInput.value.length==0){
					data="sign=未填写";
				}else if(oInput.value.length<=12){
					data="sign="+oInput.value;
				}else{
					err="签名超长"+(oInput.value.length-12)+"字";
				}
				break;
			default:
				data="未保存,请重试";
		}
		if("undefined" != typeof data){
			asynSubmit(data,"./resource/doEdit.php","POST",function(rData){
				if(rData.statu){
					noticeDialogFn("已保存");
					obj.className="fa fa-pencil";
					oInput.readOnly=true;
					oInput.className="input-read";

				}else{
					noticeDialogFn("服务器错误");
				}
			})
		}else{
			noticeDialogFn(err);
		}
	}
}

window.onload=function(){
	hiddenNav();
	$('edit-tel').onclick=function(){WRsw(this,"tel")};
	$('edit-qq').onclick=function(){WRsw(this,"qq")};
	$('edit-sign').onclick=function(){WRsw(this,"sign")};
	$('logout').onclick=function(){window.location="login.php";}
}
</script>
</html>
