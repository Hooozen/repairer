<?php
require "../include.php";
isLogin();
?>
<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="styleSheet" type="text/css" href="../style/common.css">
<title>排行榜</title>
<style>
.header{
	padding: 0;
}
.rank-btn {
	color: #fff;
	border: 1px solid #fff;
	border-radius: 5px;
	height: 24px;
	margin: 8px auto;
	overflow: hidden;
	width: 120px;
}
.rank-btn div{
	float: left;
	font-size: 14px;
	line-height: 25px;
	text-align: center;
	width: 60px;
}	
.btn-slt{
	color: #40afd2;
	background: #fff;
}
.rank-list {
	font-size: 15px;
	margin-top: 50px;
	text-align: center;
}
.th {
	color: #888;
}
table {
	color: #444;
	border-collapse: collapse;
	margin: 0 auto;
	width: 90%;
}
tr {
	line-height: 35px;
}
tr:nth-child(even) {
	background: #eee;
}
td:nth-child(4n+1) {
	color: #888;
}
</style>
<body>
<div class="header">
	<div class="rank-btn">
		<div id="year-rank" class="btn-slt">年榜</div>
		<div id="all-rank" >总榜</div>
	</div>
</div>
<ul class="nav">
	<li><a href="list.php"><i class="fa fa-laptop"></i><br>列表</a></li>
	<li><a href="task.php"><i class="fa fa-clock-o"></i><br>任务</a></li>
	<li class="selected"><i class="fa fa-list-ol"></i><br>排行</li>
	<li><a href="rinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
</ul>
<div id="rank-list" class="rank-list">
</div>
</body>
<script type="text/javascript" src="../script/common.js"></script>
<script>
function getList(type="year"){
	var xhr=new XMLHttpRequest();
	xhr.open("GET","./resource/rankdate.php?type="+type,true);
	xhr.send(null);
	xhr.onreadystatechange=function(){
		$('rank-list').innerHTML=xhr.response;
	}
}
window.onload=function(){
	getList("year");
	$('year-rank').onclick=function(){
		this.className="btn-slt";
		$('all-rank').className="";
		getList("year");
	}
	$('all-rank').onclick=function(){
		this.className="btn-slt";
		$('year-rank').className="";
		getList("all");
	}
}
</script>
</html>
