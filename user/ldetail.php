<?php
require_once '../include.php';
if(empty($_GET['lid'])){
	header("Location: history.php");
	exit;
}
$res=getlistinfo($link,$_GET['lid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="./style/common.css">
	<title>预约详情-信息科协</title>
	<style>
	a {
		display: block;
	}
	.top-face {
		color: #fff;
		font-size: 15px;
		height: 60px;
		padding: 0 50px;
		line-height: 60px;
		margin-top: 40px;
	}
	.gray{
		background: #aaa;
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
		background: #40afd2;
		border: none;
		border-radius: 5px;
		color: #fff;
		display: block;
		font-size: 16px;
		height: 35px;
		margin: 10px auto;
		padding: 2px 5px;
		width: 150px;
	}
	td{
		min-width: 70px;
		padding: 2px 5px;
		vertical-align: bottom;
	}
	.hr {
		background: #eee;
		width: 100%;
		height: 1px;
	}
	</style>
</head>
<body>
	<div id="black-bg"></div>
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
			$color="gray";
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
		<td>预约时间:</td><td><?php echo date("Y年m月d日 H:i",$res['lstime'])?></td>
		</tr>
	</table>
		<?php
		if($res['lstate']!='0'){
			echo "<div class='hr'></div>
			<table>
			<tr><td>维修人:</td><td>{$res['rname']}</td></tr>
				<tr><td>受理时间:</td><td>".date("m月d日 H:i",$res['lotime'])."</td></tr>
				<tr><td>手机:</td><td>{$res['rtel']}</td></tr>
				<tr><td>QQ:</td><td>{$res['rqq']}</td></tr>
				<tr><td>签名:</td><td>{$res['rsign']}</td></tr>";
		}
		?>
		</table>
		<?php
		if($res['lstate']>='2'){
			echo "<div class='hr'></div>
			<table>
			<tr><td>完成时间:</td><td>".date("m月d日 H:i",$res['letime'])."</td></tr>";
		}
		if($res['lstate']=='3'){
		  echo "<tr><td>评价:</td><td>".$res['lcomt']."</td></tr>";
		}
		?>
	</table>
	<div class="clear"></div>
	</div>
	<?php
	if($res['lstate']=='2'){
		echo "<a href='assess.php?lid={$res['lid']}'><button class='button'>评价</button></a>";
	}
	?>

  <ul class="nav">
    <li><a href="index.php"><i class="fa fa-th-large"></i><br/>首页</a></li>
    <li><a href="order.php"><i class="fa fa-pencil-square"></i><br/>预约</a></li>
    <li><a href="history.php"><i class="fa fa-history"></i><br/>历史</a></li>
	<li><a href="userinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
  </ul>
</body>
<script src="./script/common.js"></script>
<script>
window.onload=function(){
	$('backBtn').onclick=function(){
		history.go(-1);
	}
}
</script>
</html>
