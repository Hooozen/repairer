<?php
require_once "../../include.php";
if(!userStatu($link)){
	header("Locaton: index.php");
	exit();
}
$tel = $_POST['tel'];
$sql="update user set utel=$tel where uid={$_SESSION['userid']};";
if(mysqli_query($link,$sql)){
	echo '{"statu":true}'; 
}else{
	echo '{"statu":false,"msg":"手机号已被使用"}';
}
