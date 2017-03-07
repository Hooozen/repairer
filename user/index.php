<?php
include "../include.php";
?>
<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="styleSheet" type="text/css" href="./style/common.css">
<title>首页</title>
<style>
a {
	display: block;
}
.imgBox {
	height: 200px;
	margin: 0;
	overflow: hidden;
	padding: 0;
	position: relative;
	width: 100%;
}
.imgBox img{
	left: 0;
	position: absolute;
	top: 0;
	width: 100%;
}
#img1 {
	z-index: 1001;
}
#img2 {
	z-index: 1000;
}
#login {
	background: #fff;
	border-radius: 5px;
	border-top: 2px solid #40afd2;
	display: none;
	left: 15%;
	overflow: hidden;
	position: fixed;
	top: 150px;
	width: 70%;
	z-index: 1100;
}
#log-title {
	color: #666;
	font-size: 14px;
	margin-top: 10px;
	text-align: center;
	width: 100%;
}
#log-info {
	padding: 5px 15px;
}
#log-info input{
	border-bottom: 1px solid #eee;
	height: 30px;
	width: 100%;
}
#logbtn {
	background: #40afd2;
	color: #fff;
	line-height: 30px;
	margin-top: 10px;
	width: 100%;
}
</style>
</head>
<body>

<div id="login">
	<div id="log-title">身份验证</div>
	<div id="log-info">
		<input id="name" type="text" placeholder="姓名">
		<input id="tel" type="tel" placeholder="手机号">
	</div>
	<input id="logbtn" type="button" value="确定">
</div>
<div id="black-bg"></div>

<div id="imgBox" class="imgBox">
	<img id="img" src="images/title1.jpg">
	<div></div>
</div>
<div id="direction">
	<h2>电脑义诊</h2>
	<p>电脑义诊是由信息学院科协创办的志愿服务活动，自2009年首次举办以来一直致力于为我校师生提供电脑及周边技术服务，得到了广泛的支持和肯定。</p>
	<p>伴随广大师生的关注和支持，我们不断革新活动形式，提高服务质量。推进落实了义诊日常化工作，确保志愿活动能够及时高效的服务到每一位长大师生。</p>

	<h2>使用说明</h2>
	<p>· 预约<br>正确填写相关信息并成功提交后，我们将在后台收到你的预约信息。你只需要静静地等待我们的小伙伴联系你就好啦！
	</p>
	<p>· 历史<br>你可以通过此页面查看历史记录，并跟进预约状态，并对我们的工作做出评价
	</p>
	<p>· 我的<br>在该页面你可以查看个人基本信息，并修改联系方式
	</p>


	<h2>信息科协</h2>
	<p>信息科协努力做优秀的学生组织，如有任何问题或意见请不吝赐教!</p>
	<p>信息科协公众号:chdxxkx<br>
	信息科协交流群:328037390<br>
	信息科协办公室:明远二区2501<br></p>

	<h2>其他</h2>
	<p>本系统自费开发，服务器配置有限，请不要对本系统进行破坏性实验...<br>
	如发现任何漏洞请务必联系我，不胜感激！</p>
	<p>开发者: Hozen@live.com</p>


</div>


<ul id="nav" class="nav">
	<li class="selected"><i class="fa fa-th-large"></i><br>首页</li>
	<li><a href="order.php"><i class="fa fa-pencil-square"></i><br>预约</a></li>
	<li><a href="history.php"><i class="fa fa-history"></i><br>历史</a></li>
	<li><a href="userinfo.php"><i class="fa fa-user-o"></i><br>我的</a></li>
</ul>
</body>
<script type="text/javascript" src="./script/common.js"></script>
<script>
window.onload=function(){
	<?php
		if(!userStatu($link)){
			echo "$('black-bg').style.display='block';
			$('login').style.display='block';
			document.body.style='overflow:hidden';";
		}
	?>
	hiddenNav();
	if($('logbtn')){
		$('logbtn').onclick=function(){
			var name=$('name').value;
			var tel=$('tel').value;
			if(!chkName(name)){
				noticeDialogFn("请填写真实姓名");
			}else if(!chkTel(tel)){
				noticeDialogFn("请检查手机号");
			}else{
				sData="uname="+name+"&utel="+tel;
				console.log(sData);
				asynSubmit(sData,'./resource/doLog.php','POST',function(rData){
					if(rData){
						window.location.reload(true);
					}else{
						noticeDialogFn(rData.msg);
					}
				});
			}
		}
	}
	
	var imgArr=new Array('title1.jpg','title2.jpg');
	var curIndex=0;

	function changeImg(){
		ele=$('img');
		imgs=imgArr;
		if(curIndex==imgs.length-1){
			curIndex=0;
		}else{
			curIndex+=1;
		}
		ele.src="images/"+imgs[curIndex];
	}
	setInterval(changeImg,5000);
}

</script>
</html>
