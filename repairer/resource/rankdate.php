<?php
require_once "../../include.php";
if($_GET['type']=="year"){
	$other="最近维修"; 
	$y=date('n')>=9?date('Y'):(date('Y')-1);
	$sql="select rid, rname,rtimes from repairer where ryear=$y order by rtimes desc";
}else if($_GET['type']=="all"){
	$other="入职年份";
	$sql="select rid,rname,rtimes,ryear from repairer order by rtimes desc, ryear";
}else{
	header("Location: ../list.php");
	exit;
}
$res=fetchAll($link,$sql,MYSQLI_NUM);
echo "<table>
	<tr class='th'><td>排名</td><td>姓名</td><td>维修数</td><td>$other</td></tr>";
$i=0;
	while(!empty($res[$i])){
		if($_GET['type']=="year"){
			$sql="select lotime from list where lrid = {$res[$i][0]} order by lotime";
			$tmpres=mysqli_query($link,$sql);
			$tmparr=mysqli_fetch_array($tmpres,MYSQLI_ASSOC);
			if(empty($tmparr['lotime'])){
				$res[$i][3]="无记录";
			}else{
				$res[$i][3]=date("Y-n-d",$tmparr['lotime']);
			}
		}else{
				$res[$i][3].="年";
		}
		echo "<tr><td>".($i+1)."</td><td>".$res[$i][1]."</td><td>".$res[$i][2]."</td><td>".$res[$i][3]."</td></tr>";
		$i++;
	}
	echo "<tr><td colspan='4'>The end</td></tr>
	</table>";

