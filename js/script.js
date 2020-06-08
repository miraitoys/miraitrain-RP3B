function MJ_INSERT_TXTAREA(objTXTAREA,strTXT){
	
	var str = strTXT;
	var objAREA = document.getElementById(objTXTAREA);
	var strAREA_TXT = objAREA.value;
	var ingLen = strAREA_TXT.length;
	var selCursor = objAREA.selectionStart;
	var mae = strAREA_TXT.substr(0, selCursor);
	var ushiro = strAREA_TXT.substr(selCursor, ingLen);
	
	objAREA.value = mae + str + ushiro;
	objAREA.focus();
	
}