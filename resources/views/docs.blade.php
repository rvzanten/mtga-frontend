@extends('layouts.master')

@section('title', 'Docs')

@section('content')
    <h2>Docs</h2>
    <h3>API endpoints</h3>
	<p>
		Swagger : <a href="/swagger.json">{{ url('swagger.json' ) }}</a><br>
		grpc : <a href="{{ config('app.server_url' ) }}">{{ config('app.server_url' ) }}</a>
	</p>

	<div class="docs_content">
		{!! $docs !!}
	</div>
@endsection
