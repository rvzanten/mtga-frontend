@extends('layouts.master')

@section('title', 'Upload')

@section('content')
	<article>
		<div class="holder">
			<img src="img/doc.png" class="doc" /> Drag &amp; Drop your document here
		</div>
		<h4 class="sha256"></h4>
	</article>
	<div class='callbacks'>
		<h2>Please select your callbacks</h2>
		<input class='webhook' placeholder='http://yourwebhookurl.com/'/><br>
		<input type='email' class='email' placeholder='example@bitcoin.nl'/><br>
		<div class="result"></div>
		<button class='send'>Send</button>
		<button class='clear'>Clear</button>
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
	<script src="js/swagger-client.min.js" type="text/javascript"></script>
	<script src="js/ots.js?rev={{ $revision }}" type="text/javascript"></script>
@endsection
