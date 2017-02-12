var base;
var body = getEl('body');
var dragndrop_holder = getEl('.holder');
var send = getEl('.send');
var clear = getEl('.clear');
if (typeof window.FileReader === 'undefined') {
	alert('Filereader is not supported in this browser')
}
body.ondragover = function () {
	dragndrop_holder.className = "holder greenThick";
	dragndrop_holder.innerHTML = '<img src="img/doc.png" class="doc" /> Drag & Drop your document here';
	return false;
};
body.ondragend = function () {
	dragndrop_holder.className = "holder";
	return false;
};
body.dragleave = function () {
	dragndrop_holder.className = "holder";
	return false;
};
body.ondrop = function (e) {
	dragndrop_holder.className = "holder greenThickOk";
	dragndrop_holder.innerHTML = '<img class="tick" src="img/tick.png" />';
	e.preventDefault();
	var file = e.dataTransfer.files[0],
	reader = new FileReader();
	reader.onloadend = function () {
		hash(reader.result)
	}
	reader.readAsArrayBuffer(file);
	result("", false);
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
function result(msg, type){
	var result = getEl('.result')
	result.innerHTML = msg;
	if(type){
		result.className = "result "+type;
	}
}
function responseHandler(res, success){
	if(success){
		result(res, "success");
	}else{
		result(res, "error");
	}
}

var swagger = new SwaggerClient({
	url : window.location.origin +'/swagger.json',
	success: function() {

		var a = document.createElement("a");
		var href = document.createAttribute("href");
		href.value = baseurl;
		a.setAttributeNode(href);

		swagger.setSchemes([a.protocol.substring(0,a.protocol.length-1)]);
		swagger.setHost(a.host);
		swagger.setBasePath(a.pathname);
	},
	failure: function() {
		responseHandler("Something went wrong on our end", false);
	}
});

send.addEventListener('click', function(){
	var input_email = getEl('.email').value;
	var webhook_url = getEl('.webhook');
	var hash = getEl('.sha256');
	if (webhook_url.value ){
		var input_callback = webhook_url.value;
	} else {
		var input_callback = '';
	}
	if(input_email.length == 0){
		result("E-mail field empty", "error");
		return;
	}
	if (getEl('.sha256').innerHTML.length != 64 ){
		result("Invalid document hash", "error");
		return;
	}
	swagger.Timestamp.WithCallback({
			body:{
				document_hash: base,
				webhook_url: input_callback,
				email_address: input_email
			}
		},
		function(data){
			if(data){
				responseHandler("Document hash submitted!", true);
			}
		},
		function(error){
			responseHandler(error, false);
		}
	);
});
clear.addEventListener('click',function(){
	result("")
	var input_email = getEl('.email');
		input_email.value = '';
	var webhook_url = getEl('.webhook');
		webhook_url.value = '';
});
