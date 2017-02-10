var base;
var holder = document.getElementById('holder');

if (typeof window.FileReader === 'undefined') {
	alert('Filereader is not supported in this browser')
}
holder.ondragover = function () {
	this.className = 'hover';
	return false;
};
holder.ondragend = function () {
	this.className = '';
	return false;
};
holder.ondrop = function (e) {
	this.className = '';
	e.preventDefault();
	var file = e.dataTransfer.files[0],
			reader = new FileReader();
	reader.onloadend = function () {
		hash(reader.result)
		console.log(reader.result)
	}
	reader.readAsArrayBuffer(file);
	return false;
};
function hash(blob) {
	var hash = document.getElementById('sha256')

	hash.innerHTML = CryptoJS.SHA256(arrayBufferToWordArray(blob)).toString(CryptoJS.enc.Hex);
	base = CryptoJS.SHA256(arrayBufferToWordArray(blob)).toString(CryptoJS.enc.Base64);
	console.log(base)
}
function arrayBufferToWordArray(ab) {
	var i8a = new Uint8Array(ab);
	var a = [];
	for (var i = 0; i < i8a.length; i += 4) {
		a.push(i8a[i] << 24 | i8a[i + 1] << 16 | i8a[i + 2] << 8 | i8a[i + 3]);
	}
	return CryptoJS.lib.WordArray.create(a, i8a.length);
}

/**
 *
 * @param {array} params
 * @endpoint {string} apiendpoint
 * @methode {string} post / get
 * @cb {callback} function
 * @returns {undefined}
 */
function api(params, method, endpoint, cb) {
	var url = baseurl + endpoint;
	console.log(url);
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
			console.log('There was an error with your request');
			cb("Error");
		}
	};
	request.onerror = function () {
		cb("Error")
		// There was a connection error of some sort
	};
	request.send();
}

var send = document.getElementById('send');
	send.addEventListener('click', function(){
		var errors = document.getElementById('error')
		var input_email = document.getElementById('email');
		var webhook_url = document.getElementById('webhook');
			if (webhook_url.value ){
				var webhook = webhook_url.value;
			} else {
				var webhook = '';
			}
		errors.innerHTML = ''
			if(input_email.value.length == 0){
				errors.innerHTML += 'No a valid Email address';
				return;
			}

			var hash = document.getElementById('sha256');
			if (document.getElementById('sha256').innerHTML.length != 64 ){
				errors.innerHTML += "Invalid Hash"
				return;

			}

			var item = {
				document_hash: base,
				webhook_url: webhook,
				email_address: email
			}
			api(item,'POST','1/withcallback',responseHandler);

	});

function responseHandler(res){
	console.log(res);
	alert(res);
}

var clear = document.getElementById('clear');
	clear.addEventListener('click',function(){
		var input_email = document.getElementById('email');
			input_email.value = '';
		var webhook_url = document.getElementById('webhook');
			webhook_url.value = '';

	});
