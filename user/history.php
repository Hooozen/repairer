<?php
require_once"../include.php";
$statu=userStatu($link);
if($statu){
	$records=getuserlist($link,$_SESSION['userid']);
	$userInfo=getuserinfo($link,$_SESSION['userid']);
}else{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="./style/common.css">
	<title>历史记录-信息科学</title>
	<style>
	html{
		background: #eee;
	}
	a {
		display: block;
	}
	.ulist{
		background: #fff;
		box-shadow: 0 1px 2px rgba(0,0,0,0.3);
		margin: 0 0 5px;
		overflow: hidden;
		padding: 10px;
		width: 100%;
	}
	.lheader{
		border-bottom: 1px solid #eee;
		margin: 10px;
		line-height: 20px;
	}
	.stime{
		color: #aaa;
		font-size: 10px;
	}
	.statu{
		font-size: 14px;
		width: 100px;
	}
	.gray{
		color: #aaa;
	}
	.red{
		color: #ff3828;
		border-color: #ff3828;
	}
	.yellow{
		color: #ff7200;
		border-color: #ff7200;
	}
	.green{
		color: #008300;
	}
	.blue {
	  color: #0b6bd4;
	}
	.clear{
		clear: both;
	}
	.lmain{
		padding: 10px;
	}
	.detail{
		color: #444;
		font-size: 15px;
		padding-right: 10px;
	}
	.rinfo{
		color: #666;
		font-size: 13px;
	}
	.right{
		text-align: right;
	}
	.firstcol{
		border-bottom: 1px solid #000;
	}
	.uinfo{
		color: #aaa;
		font-size: 12px;
	}
	.btn{
		border-width: 1px;
		border-style: solid;
		border-radius: 5px;
		font-size: 14px;
		text-align: center;
	}

	#info-card{
		background: #fff;
		border-radius: 5px;
		color: #888;
		display: none;
		font-size: 12px;
		margin-top: -180px;
		margin-right: -34%;
		overflow: hidden;
		position: fixed;
		right: 50%;
		top: 50%;
		width: 68%;
		z-index: 1001;
	}
	.infcard-titl{
		background: #f24747;
		color: #fff;
		font-size: 16px;
		height: 40px;
		line-height: 40px;
		text-align: center;
	}
	#close-btn{
		border-radius: 4px;
		display: block;
		background: #aaa;
		color: #fff;
		font-size: 14px;
		margin: 10px auto;
		text-align: center;
		width: 100px;
	}
	.content{
		margin: 45px 0 0 ;
		width: 100%;
	}
	table{
		padding: 0 10px;
	}
	#empty{
		color: #aaa;
		font-size: 20px;
		margin-top: 100px;
		text-align: center;
	}
	</style>
</head>
<body>
  <div class="header">
  维修记录 
  </div>
  <div class="content">

	<?php
	if(empty($records)){
		echo"<div id='empty'>没有历史记录</div>";
	}else{
			$i=0;
			while($i<count($records)){
				switch($records[$i]['lstate']){
					case '0':
						$color="gray";
						$lstate='预约中';
						break;
					case '1':
						$color="yellow";
						$lstate='处理中';
						break;
					case '2':
						$color="red";
						$lstate='待评价';
						break;
					case '3':
						$color="blue";
						$lstate='已完成';
						break;
					default:
						$color="";
						$lstate="";
				}
				echo "<a href='ldetail.php?lid={$records[$i]['lid']}'>
			<table class='ulist' id='ulist'>
				<tr class='firstcol'>
					<td class='stime'>".date("Y年m月d日 H:i",$records[$i]['lstime'])."</td>
					<td class='statu right $color'>".$lstate."</td>
				</tr>
				<tr>
					<td class='detail'>".$records[$i]['ldetail']."</td>";
				
				echo "
				</tr>
				<tr>
					<td class='uinfo'>手机:".$userInfo['utel']."  公寓:".$userInfo['uapart']."号楼</td>";
				if($records[$i]['lstate']!='0'){
					echo"
					<td class='rinfo right'>维修人:{$records[$i]['rname']}</td>";
				}
				echo "
				</tr>
			</table></a>";
				$i++;
			}
	}
	?>
  </div>
	<ul class="nav">
		<li><a href="index.php"><i class="fa fa-th-large"></i><br/>首页</a></li>
		<li><a href="order.php"><i class="fa fa-pencil-square"></i><br/>预约</a></li>
		<li class="selected"><i class="fa fa-history"></i><br/>历史</li>
		<li><a href="userinfo.php"><i class="fa fa-user-o"></i><br/>我的</a></li>
	</ul>
	<div id="info-card">
	<div class="infcard-titl">维修人信息</div>
	<table>
	<tr><td class="td-right">姓名:</td><td id="rinfo-name"></td></tr>
	<tr><td class="td-right">手机:</td><td id="rinfo-tel"><i class="fa fa-files-o"></i></td>
	<tr><td class="td-right">Q Q:</td><td id="rinfo-qq"><i class="fa fa-files-o"></i></td>
	<tr><td class="td-right">签名:</td><td id="rinfo-sign"></td></tr>
	</table>
	<botton id="close-btn">关闭</botton>
	</div>
	<div id="black-bg"></div>
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
</script>
</html>
