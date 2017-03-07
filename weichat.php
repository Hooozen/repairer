<?php
//验证接口start
	$signature = $_GET["signature"];
	$timestamp = $_GET["timestamp"];
	$nonce     = $_GET["nonce"];
	$echoStr   = $_GET['echostr'];
	$token = 'xxkx';

	$tmpArr = array($token, $timestamp, $nonce);
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode('',$tmpArr);
	$tmpStr = sha1( $tmpStr );

	if( $tmpStr == $signature && $echoStr){
		echo $echoStr;
		exit;
	}else{
		responseMsg();
	}
//验证接口 end
function responseMsg(){

	$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];

	$postObj = simplexml_load_string($postArr);

	$template = "<xml>
		     <ToUserName><![CDATA[%s]]></ToUserName>
		     <FromUserName><![CDATA[%s]]></FromUserName>
		     <CreateTime>%s</CreateTime>
		     <MsgType><![CDATA[%s]]></MsgType>
		     <Content><![CDATA[%s]]></Content>
		     </xml>";

	if(strtolower($postObj->MsgType)=='event'){
		if(strtolower($postObj->Event=='subscribe')){
			$toUser   = $postObj->FromUserName;
			$fromUser = $postObj->ToUserName;
			$time     = time();
			$msgType  = 'text';
			$content  = '欢迎关注我们的公众号';
			$info     = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
			echo $info;
		}
	}else if(strtolower($postObj->MsgType)=='text'){
		$MsgContent=strtolower($postObj->Content);
		if($MsgContent=="电脑义诊"||$MsgContent=='义诊预约'||$MsgContent=='义诊'||$MsgContent=='预约'){
			$toUser   = $postObj->FromUserName;
			$fromUser = $postObj->ToUserName;
			$time     = time();
			$msgType  = 'text';
			$content  = "点击填写预约信息:www.repair.chdxxkx.cn/index.php?oid=".$toUser; 
			$info     = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
			echo $info;
		}
	}

}
