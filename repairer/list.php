<?php
require_once "../include.php";
isLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="../style/common.css">
	<title>预约单-信息科协</title>
	<style>
		html{background: #eee}
		a{
			display: block;
		}
		.content {
			margin: 45px 0 0;
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
			color: #aaa;
			height: 20px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="header">
		全部预约
	</div>
	<div id="content" class="content">
	</div>
	<div id="end" class="end"><i class='fa fa-spinner fa-pulse fa-fw'></i>加载中</div>
	<ul class="nav">
		<li class="selected"><i class="fa fa-laptop"></i><br>列表</li>
		<li><a href="task.php"><i class="fa fa-clock-o"></i><br>任务</a></li>
		<li><a href="rank.php"><i class="fa fa-list-ol"></i><br>排行</a></li>
		<li><a href="rinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
	</ul>
</body>
<script type="text/javascript" src="../script/common.js"></script>
<script>
window.onload=function(){
	getList("./resource/listdata.php?rows=8&index=1");
	var i=9;
	var isNull=false;
	window.onscroll=function(){
		cHeight=(document.documentElement.clientHeight)+(document.body.scrollTop||document.documentElement.scrollTop);
		eList=$('content').lastChild;
		ctHeight=eList.offsetTop+eList.offsetHeight+20;
		if(ctHeight<cHeight&&!isNull){
			getList("./resource/listdata.php?rows=10&index="+i);
			i+=10;
		}
		if(isNull){
			$('end').innerHTML="没有更多了";
		}
	}
	function getList(url){
		var xhr =new XMLHttpRequest();
		xhr.open("GET",url,true)
		xhr.send(null);
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4&&xhr.status==200){
				rdata=xhr.response;
				if(rdata==''){
					isNull=true;
				}else{
					$('content').innerHTML+=rdata;
				}
			}
		}
	}
}
</script>
</html>
