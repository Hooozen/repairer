<?php
require_once "../../include.php";
if(!empty($_POST['tel'])){
	$col="rtel";
	$val=$_POST['tel'];
}else if(!empty($_POST['qq'])){
	$col="rqq";
	$val=$_POST['qq'];
}else if(!empty($_POST["sign"])){
	$col="rsign";
	$val=$_POST["sign"];
}else{
	header("Location: ../list.php");
	exit;
}
$sql="update repairer set $col=\"$val\" where rid={$_SESSION['rid']};";
if(mysqli_query($link,$sql)){
	echo '{"statu":true}'; 
}else{
	echo '{"statu":false}';
}
