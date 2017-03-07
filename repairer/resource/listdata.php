<?php
require_once "../../include.php";
if(empty($_GET['index'])||empty($_GET['rows'])){
	header('Location: ../list.php');
	exit;
}
$index=$_GET['index']-1;
$sql="SELECT lid,ustunum,ldetail,lstime,lotime,lstate,uname FROM list,user WHERE luid=uid order by lstime desc limit $index, {$_GET['rows']}";
$result=mysqli_query($link,$sql);
while(@$row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	echo "<a href='ldetail.php?lid={$row['lid']}'><div class='list'>
	<div class='title'>".$row['uname']." <span class='time'>".date("Y年m月d日 H:i",$row['lstime'])."</span></div>
	<div class='detial'>".$row['ldetail']."</div>";
	if($row['lstate']=="0"){
		echo "
		<div class='statu uncplt'>
			<i class='fa fa-exclamation-circle'></i> 未处理<br>
		</div>
		";
	}else if($row['lstate']=="1"){
		echo "
		<div class='statu incplt'>
			<i class='fa fa-clock-o'></i> 处理中<br>
			<span class='time'>1月3日 12:21</span>
		</div>
		";
	}else{
		echo "
		<div class='statu cplt'>
			<i class='fa fa-check-circle-o'></i> 已处理<br>
			<span class='time'>1月3日 12:21</span>
		</div>
		";
	}
	echo "</div></a>";
}

