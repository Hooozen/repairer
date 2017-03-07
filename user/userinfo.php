<?php
	require_once "../include.php";
	$statu=userStatu($link);
	if($statu){
		$info=getuserinfo($link,$_SESSION['userid']);
	}else{
		header("Location: index.php");	
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="./style/common.css">
  <title>用户信息</title>
<style>
  body {
    background: #fcfcfc;
  }
  a {
	  display: block;
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
	  padding-left: 8px;
	  width: 92px;
  } 
  .input-write{
	  border-bottom: 1px solid #eee;
	  color: #444;
	  padding-left: 8px;
	  width: 92px;
	}
  table {
    border-collapse: collapse;
	margin: 10px;
  }
  tr{
    line-height: 35px;
  }
  td:nth-child(1){
    width: 92px;
    color: #aaa;
  }
  td:nth-child(2){
    color: #666;
  }
  th {
	  color: #40afd2;
  }
</style>
</head>
<body>
  <div class="header">
  个人信息
  </div>
  <div style="height: 50px"></div>
  <div class="info-card">
    <table>
	<th>基本信息</th>
    <tr><td>姓名</td><td><?php echo $info['uname'];?></td></tr>
    <tr><td>学号</td><td><?php echo $info['ustunum'];?></td></tr>
    <tr><td>公寓楼</td><td><?php echo $info['uapart']?> 楼</td></tr>
    <tr><td>预约次数</td><td><?php echo $info['utimes']?> 次</td></tr>
    </table>
  </div>
  <div class="info-card">
	<table>
	<th>联系方式</th>
	<tr><td>手机</td><td><input id="oinput" class="input-read" type="tel" <?php echo "value=\"{$info['utel']}\""; ?>readonly="true"> <i id="edit-tel"  class="fa fa-pencil"></i></td></tr>
	</table>
  </div>
  <ul id="nav" class="nav">
    <li><a href="index.php"><i class="fa fa-th-large"></i><br/>首页</a></li>
    <li><a href="order.php"><i class="fa fa-pencil-square"></i><br/>预约</a></li>
    <li><a href="history.php"><i class="fa fa-history"></i><br/>历史</a></li>
    <li class="selected"><i class="fa fa-user-o"></i><br/>我的</li>
  </ul>
</body>
<script type="text/javascript" src="./script/common.js"></script>
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
	oInput=$('oinput');
	editTel=$('edit-tel');
	editTel.onOff=true;
	editTel.onclick=function(){
		if(this.onOff){
			this.className="fa fa-save";
			oInput.readOnly=false; 
			oInput.className="input-write";
			oInput.focus();
			oInput.setSelectionRange(0,11);
			this.onOff=false;
		}else if(chkTel(oInput.value)){
			data="tel="+oInput.value;
			asynSubmit(data,"resource/doEdit.php","POST",function(rData){
				if(rData.statu){
					noticeDialogFn("已保存");
					editTel.className="fa fa-pencil";
					oInput.readOnly=true;
					oInput.className="input-read";
					editTel.onOff=true;
				}else{
					noticeDialogFn(rData.msg);
				}
			})
		}else{
			noticeDialogFn("请检查手机号");
		}
	}
}
</script>
</html>
