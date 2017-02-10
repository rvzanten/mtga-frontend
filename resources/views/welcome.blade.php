@extends('layouts.master')

@section('title', 'Upload')

@section('content')
	<article>
		<div id="holder">
			Drag and Drop your document here
		</div>
		<h4 id="sha256"></h4>
	</article>
	<div id='callbacks'>
		<h2>Please select your callbacks</h2>
		<input id='webhook' placeholder='http://yourwebhookurl.com/'/><br>
		<input type='email' id='email' placeholder='example@bitcoin.nl'/><br>
		<div id='error'></div>
		<button id='send'>Send</button>
		<button id='clear'>Clear</button>
	</div>
@endsection

@section('js')
	<script>
		var baseurl = "{{ $server_url }}" ;
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/sha256.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-hex.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.js" type="text/javascript"></script>
	<script src="js/ost.js" type="text/javascript"></script>
@endsection
