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
