function $(id){
	return document.getElementById(id);
}

function hiddenNav(){
	var h=document.body.scrollHeight;
	window.onresize=function(){
		if(document.body.scrollHeight<h){
			$('nav').style.display="none";
		}else{
			$('nav').style.display="flex";
		}
	}
}
	
function getRadioVal(name){
    var radio=document.getElementsByName(name);
    for(var i=0;i<radio.length;i++){
        if(radio[i].checked){
            return radio[i].value;
        }
    }
}

function confDialog(message,ybtn,nbtn){
	var blackBg=document.createElement("div");
	blackBg.id="black-bg";
    var confDia=document.createElement("div");
    confDia.id="dialog-conf";
    confDia.innerHTML="<div id='conf-message'></div>"+(ybtn?"<div id='conf-y'>"+ybtn+"</div>":"")+(nbtn?"<div id='conf-n'>"+nbtn+"</div>":"");
	document.body.appendChild(blackBg);
    document.body.appendChild(confDia);
	$('black-bg').style.display="block";
    $('conf-message').innerText=message;
	if($('conf-n')){
		$('conf-n').onclick=function(){
			document.body.removeChild(confDia);
			document.body.removeChild(blackBg);
		}
	}
}

function noticeDialogFn(message,top="15%",time=1){
	var oBody=document.body;
	var noticeDia=document.createElement("div");
	noticeDia.id="noticeDialog";
    noticeDia.className="dialog";
	noticeDia.innerHTML="<div id='dialogMess'><i class='fa fa-exclamation-triangle'></i> <span id='diaText'>"+message+"</span></div>"
	noticeDia.style.top=top;
	oBody.appendChild(noticeDia);
	var t=setTimeout("$('noticeDialog').parentNode.removeChild($('noticeDialog'))",time*1000);
}

function loadingDialogFn(display=true,message='',top="15%"){
    if(display){
        var oBody=document.body;
        var loadingDia=document.createElement("div");
        loadingDia.id="loadingDia";
        loadingDia.className="dialog";
        loadingDia.innerHTML="<div id='dialogMess'><i class='fa fa-spinner fa-pulse fa-fw'></i> <span id='diaText'>"+message+"</span></div>"
        loadingDia.style.top=top;
        oBody.appendChild(loadingDia);
    }else{
        $('loadingDia').parentNode.removeChild($('loadingDia'));
    }
}

function asynSubmit(sData,action,method="POST",callback){
    var httpRequest = new XMLHttpRequest();
    var rMessage="请求未发送";
    httpRequest.open(method,action);
    httpRequest.setRequestHeader("content-type","application/x-www-form-urlencoded");
    httpRequest.send(sData);
    httpRequest.onreadystatechange=function(){
    	var rData={
    		"status":"0",
    		"message":"0"
    	}
        if(httpRequest.readyState===4&&httpRequest.status===200){
            rData=JSON.parse(httpRequest.responseText);
            callback(rData);
        }
	}
}

function getByClass(clsName,parent){
    var oParent=parent?document.getElementById(parent):document;
    var eles=[];
    var elements=oParent.getElementsByTagName('*');
    for(var i=0;i<elements.length;i++){
        if(elements[i].className==clsName){
            eles.push(elements[i]);
        }
    }
    return eles;
}

function checkTel(telnum){
	if(/^1[34578]\d{9}$/.test(telnum)){
		return true;
	}else{
		return false;
	}
}
