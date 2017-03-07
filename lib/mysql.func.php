<?php
	function connect(){
		$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
		mysqli_set_charset($link,DB_CHARSET);
		if($link->connect_error){
			return $link->connect_error;
		}else{
			return $link;
		}
	}
	function insert($link,$table,$array){
		$keys=join(",",array_keys($array));
		$vals="'".join("','",array_values($array))."'";
		$sql="INSERT INTO {$table}($keys) VALUES({$vals})";
		mysqli_query($link,$sql);
		return mysqli_insert_id($link);
	}

	function update($link,$table,$array,$where=null){
		foreach($array as $key=>$val){
			if(@$str==null){
				$sep="";
			}else{
				$sep=",";
			}
			@$str.=$sep.$key."='".$val."'";
		}
		$sql="update {$table} set {$str}".($where==null?null:"where ".$where);
		mysqli_query($link,$sql);
		return mysqli_affected_rows($link);
	}

	function delete($link,$table,$where=null){
		$where=$where==null?null:"where".$where;
		$sql="delete from {$table} {$where}";
		myslqi_query($link,$sql);
		return mysqli_affected_rows($link);
	}

	function fetchOne($link,$sql,$result_type=MYSQLI_ASSOC){
		$result = mysqli_query($link,$sql);
		if($result){
			$row = mysqli_fetch_array($result,$result_type);
			return $row;
		}else{
			return 0;
		}
	}

	function fetchAll($link,$sql,$result_type=MYSQLI_ASSOC){
		$result = mysqli_query($link,$sql);
		while(@$row=mysqli_fetch_array($result,$result_type)){
			$rows[]=$row;
		}
		if(!empty($rows)){
			return $rows;
		}else{
			return 0;
		}
	}

	function getResultNum($link,$sql){
		$result=mysqli_query($link,$sql);
		return mysqli_num_rows($result);
	}
