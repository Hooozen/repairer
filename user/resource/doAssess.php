<?php
require_once "../../include.php";
if(empty($_POST['lid'])||empty($_POST['assess'])){
	header("Location: ../history.php");
	exit;
}
$lid=$_POST['lid'];
$assess=$_POST['assess'];
$sql="select lstate from list where lid = $lid";
$res=fetchOne($link,$sql);
if($res['lstate']!='2'){
	echo '{"statu":0,"message":"state_error"}';
	exit;
}
$arr=[
  "lcomt"=>$assess,
	"lstate"=>"3"
	];
$res=update($link,'list',$arr,"lid=$lid");
if($res==1){
  echo '{"statu":1,"message":"success"}';
}else{
  echo '{"statu":0,"message":"insert_failed"}';
}
