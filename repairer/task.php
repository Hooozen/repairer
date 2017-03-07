<?php
require_once "../include.php";
isLogin();
$sql="SELECT * FROM list,user WHERE lrid={$_SESSION['rid']} AND luid=uid";
$i=0;
$result=mysqli_query($link,$sql);
while((@$row=mysqli_fetch_array($result,MYSQLI_ASSOC))&&($i<10)){
	$rows[]=$row;
	$i++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="../style/common.css">
	<title>我的任务-信息科协</title>
	<style>
		html{background: #eee}
		a{
			display: block;
		}
		.content {
			margin: 40px 0 0;
			width: 100%;
		}
		.list {
			background: #fff;
			margin-bottom: 5px;
			padding: 10px 15px 5px;
			position: relative;
		}
		.title {
			border-bottom: 1px solid #eee;
			color: #666;
			display: inline-block;
			font-size: 14px;
		}
		.time {
			font-size: 10px;
			color: #aaa;
		}
		.detial {
			color: #444;
			font-size: 14px;
			padding: 10px 0 10px 15px;
			vertical-align: top;
			width: 60%;
		}
		.statu {
			bottom: 5px;
			font-size: 12px;
			height: 30px;
			position: absolute;
			right: 20px;
			text-align: center;
			width: 75px;
		}
		.cplt {
			color: #04ad20;
		}
		.uncplt{
			color: red;
		}
		.incplt{
			color: #ff8105;
		}
		.end {
			text-align: center;
			color: #aaa;
		}
	</style>
</head>
<body>
	<div class="header">
		我的任务
	</div>
	<div class="content">
	<?php
	for($i=$i-1;$i>=0;$i--){
		echo "<a href='ldetail.php?lid={$rows[$i]['lid']}'><div class='list'>
			<div class='title'>".$rows[$i]['uname']." <span class='time'>".date("Y年m月d日 H:i",$rows[$i]['lstime'])."</span></div>
			<div class='detial'>".$rows[$i]['ldetail']."</div>";
		if($rows[$i]['lstate']=="0"){
			echo "
			<div class='statu uncplt'>
				<i class='fa fa-spinner'></i> 未处理<br>
			</div>
			";
		}else if($rows[$i]['lstate']=="1"){
			echo "
			<div class='statu incplt'>
				<i class='fa fa-clock-o'></i> 处理中<br>
				<span class='time'>1月3日 12:21</span>
			</div>
			";
		}else{
			echo "
			<div class='statu cplt'>
				<i class='fa fa-check-circle-o'></i> 已完成<br>
				<span class='time'>1月3日 12:21</span>
			</div>
			";
		}
		echo "</div></a>";
	}
	?>
	</div>
	<div class="end">没有更多了</div>
	<ul class="nav">
		<li><a href="list.php"><i class="fa fa-laptop"></i><br>列表</a></li>
		<li class="selected"><i class="fa fa-clock-o"></i><br>任务</li>
		<li><a href="rank.php"><i class="fa fa-list-ol"></i><br>排行</a></li>
		<li><a href="rinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
	</ul>
</body>
</html>
