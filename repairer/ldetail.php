<?php
require_once '../include.php';
isLogin();
$res=getlistinfo($link,$_GET['lid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="../style/common.css">
	<title>预约详情-信息科协</title>
	<style>
	.top-face {
		color: #fff;
		font-size: 15px;
		height: 60px;
		padding: 0 50px;
		line-height: 60px;
		margin-top: 40px;
	}
	.red{
		background: #ff3828;
	}
	.yellow{
		background: #ff7200;
	}
	.green{
		background: #008300;
	}
	.list-detail{
		border-bottom: 1px solid #eee;
		color: #888;
		font-size: 14px;
		padding: 10px 10px;
	}
	.button{
		background: #fff;
		float: right;
		border: 1px solid #ff7200;
		border-radius: 5px;
		color: #ff7200;
		padding: 2px 5px;
	}
	td{
		min-width: 70px;
		padding: 2px 5px;
		vertical-align: top
	}
	</style>
</head>
<body>
	<div class="header">
		<div class="back-btn" id="backBtn">
			<i class="fa fa-angle-left"></i>
		</div>
		预约详情
	</div>
	<?php 
	switch($res['lstate']){
		case '0':
			$state="<i class='fa fa-exclamation-circle'></i> 未处理";
			$color="red";
			break;
		case '1':
			$state="<i class='fa fa-clock-o'></i> 处理中";
			$color="yellow";
			break;
		case "2":
			$state="<i class='fa fa-check-circle-o'></i> 待评价";
			$color="green";
			break;
		case "3":	
		  $state="<i class='fa fa-check-circle-o'></i> 已完成";
			$color="green";
			break;

	}
		echo "
	<div class='top-face $color'>
		$state
	</div>";
	?>
	<div class="list-detail">
	<table>
		<tr>
		<td>预约人:</td><td><?php echo $res['uname']?></td>
		</tr>
		<tr>
		<td>电话:</td><td><?php echo $res['utel']?></td></tr>
		<tr>
		<td>公寓号:</td><td><?php echo $res['uapart']?></td>
		</tr>
		<tr>
		<td>详情描述:</td><td><?php echo $res['ldetail']?></td>
		</tr>
		<tr>
		<td>设备:</td><td><?php echo $res['ldevice']?></td>
		</tr>
		<tr>
		<td>申请时间:</td><td><?php echo date("m月d日 H:i", $res['lstime'])?></td>
		</tr>
		<?php
		if($res['lstate']!='0'){
			echo "<tr><td>处理人:</td><td>{$res['rname']}</td></tr>
				<tr><td>处理时间:</td><td>".date("m月d日 H:i",$res['lotime'])."</td></tr>";
		}
		if($res['lstate']>'2'){
			echo "<tr><td>完成时间:</td><td>".date("m月d日 H:i",$res['letime'])."</td></tr>";
		}
		if($res['lstate']=='3'){
		  echo "<tr><td>评价:</td><td>".$res['lcomt']."</td></tr>";
		}
		?>
	</table>
	<?php
	if($res['lstate']=='0'){
		echo "<button class='button' id='wtdo' lid='{$res['lid']}'>申请处理</button>";
	}else if($res['lstate']=='1'&&$res['lrid']==$_SESSION['rid']){
		echo "<button class='button' id='tocplt' lid='{$res['lid']}'>完成服务</button>";
	}
	?>
	<div class="clear"></div>
	</div>
	<ul class="nav">
		<li><a href="list.php"><i class="fa fa-laptop"></i><br>列表</a></li>
		<li><a href="task.php"><i class="fa fa-clock-o"></i><br>任务</a></li>
		<li><a href="rank.php"><i class="fa fa-list-ol"></i><br>排行</a></li>
		<li><a href="rinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
	</ul>
</body>
<script src="../script/common.js"></script>
<script>
window.onload=function(){
	if($('wtdo')!=null){	
		$('wtdo').onclick=function(){
			if($('loadingDia')){
				noticeDialogFn("请勿重复操作");
			}else{
				var data="statu=1&&lid="+this.getAttribute('lid');
				asynSubmit(data,"./resource/lstatechg.php","POST",function(data){
					if(data.statu=="1"){
						loadingDialogFn('true',"已申请成功，请尽快联系处理");
						setTimeout("window.location.reload()",1000);
					}else{
						noticeDialogFn(data.message);
					}
				})
			}
		}
	}
	if($('tocplt')){
		$('tocplt').onclick=function(){
			confDialog("请确保已完成此次服务","确定","取消");
			$('conf-y').onclick=function(){
				var data="statu=2&&lid="+$('tocplt').getAttribute('lid');
				asynSubmit(data,"./resource/lstatechg.php","POST",function(data){
					if(data.statu=="1"){
						loadingDialogFn('true',data.message);
						setTimeout(window.location.reload(),1000);
					}else{
						noticeDialogFn(data.message);
					}
				})
			}
		}
	}
	$('backBtn').onclick=function(){
		history.go(-1);
	}
}
</script>
</html>
