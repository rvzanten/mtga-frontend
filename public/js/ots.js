var base;
var body = getEl('body');
var dragndrop_holder = getEl('.holder');
var send = getEl('.send');
var clear = getEl('.clear');
if (typeof window.FileReader === 'undefined') {
	alert('Filereader is not supported in this browser')
}
body.ondragover = function () {
	dragndrop_holder.style.borderColor = "black";
	dragndrop_holder.innerHTML = 'Drag and Drop your document here';
	return false;
};
body.ondragend = function () {
	dragndrop_holder.style.borderColor = "#ccc";
	return false;
};
body.dragleave = function () {
	dragndrop_holder.style.borderColor = "#ccc";
	return false;
};
body.ondrop = function (e) {
	dragndrop_holder.style.borderColor = "#39b54a"
	dragndrop_holder.innerHTML = '<img src="img/tick.png" />';
	e.preventDefault();
	var file = e.dataTransfer.files[0],
	reader = new FileReader();
	reader.onloadend = function () {
		hash(reader.result)
	}
	reader.readAsArrayBuffer(file);
	return false;
};
function getEl(selector){
	return document.querySelector(selector);
}
function hash(blob) {
	var hash = getEl('.sha256');
	hash.innerHTML = CryptoJS.SHA256(arrayBufferToWordArray(blob)).toString(CryptoJS.enc.Hex);
	base = CryptoJS.SHA256(arrayBufferToWordArray(blob)).toString(CryptoJS.enc.Base64);
}
function arrayBufferToWordArray(ab) {
	var i8a = new Uint8Array(ab);
	var a = [];
	for (var i = 0; i < i8a.length; i += 4) {
		a.push(i8a[i] << 24 | i8a[i + 1] << 16 | i8a[i + 2] << 8 | i8a[i + 3]);
	}
	return CryptoJS.lib.WordArray.create(a, i8a.length);
}
function api(params, method, endpoint, cb) {
	var url = baseurl + endpoint;
	var request = new XMLHttpRequest();
	request.open(method, url, true);
	if (method == 'POST'){
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		request.send(params);
	}
	request.onload = function () {
		if (request.status >= 200 && request.status < 400) {
			var resp = request.responseText;
			cb(resp);
		} else {
			cb("Error, got wrong answer from the server.");
		}
	};
	request.onerror = function () {
		cb("Something went wrong on our end.");
	};
	request.send();
}
send.addEventListener('click', function(){
	var errors = getEl('.error')
	var input_email = getEl('.email');
	var webhook_url = getEl('.webhook');
	var hash = getEl('.sha256');
	if (webhook_url.value ){
		var webhook = webhook_url.value;
	} else {
		var webhook = '';
	}
	errors.innerHTML = '';
	if(input_email.value.length == 0){
		errors.innerHTML += 'No a valid Email address';
		return;
	}
	if (getEl('.sha256').innerHTML.length != 64 ){
		errors.innerHTML += "Invalid Hash";
		return;
	}
	api({
		document_hash: base,
		webhook_url: webhook,
		email_address: email
	},'POST','/1/withcallback',responseHandler);
});
function responseHandler(res){
	//TODO no ugly alert
	alert(res);
}
clear.addEventListener('click',function(){
	var input_email = getEl('.email');
		input_email.value = '';
	var webhook_url = getEl('.webhook');
		webhook_url.value = '';
});
