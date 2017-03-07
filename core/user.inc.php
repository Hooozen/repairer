<?php
	function getuserinfo($link,$uid){
		$sql="SELECT * FROM user where uid=".$uid;
		return fetchOne($link,$sql,MYSQLI_ASSOC);
	}
	function getuserlist($link,$uid){
		$sql="SELECT * FROM list where luid=$uid order by lstime desc";
		$rows = fetchAll($link,$sql,MYSQLI_ASSOC);
		$i = 0;
		while($i<count($rows)){
			if($rows[$i]['lstate']!=0){	
				$rows[$i]=fetchOne($link,"SELECT * FROM list,repairer WHERE lid={$rows[$i]['lid']} AND lrid=rid");
				}
			$i++;
		}
		return $rows;
	}

	function userStatu($link){
		if(@$_SESSION['userid']){
			$sql="select * from user where uid = {$_SESSION['userid']}";
			$arr=fetchOne($link,$sql);		
			if($arr){
				return true;
			}else{
				unset($_SESSION['userid']);
				echo"<script>window.location='index.php'</script>";
			}
		}else{
			return false;	
		}
	}
	
	function isReg($link){
		$sql="select * from user where uid = {$_SESSION['userid']}";
		$arr=fetchOne($link,$sql);
		if($arr['ustunum']&&$arr['uapart']){
			return true;
		}else{
			return false;
		}
	}
		
		

