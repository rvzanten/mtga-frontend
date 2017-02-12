@extends('layouts.master')

@section('title', 'Docs')

@section('content')
    <h2>Docs</h2>
    <h3>API endpoints</h3>
	<p>
		Swagger : <a href="/swagger.json">{{ url('swagger.json' ) }}</a><br>
		grpc : <a href="{{ config('app.server_url' ) }}">{{ config('app.server_url' ) }}</a>
	</p>
    <h3>Swagger</h3>
	<iframe src="/swagger-ui" class="swaggerui widthCenter"></iframe>
	<h3>Grpc</h3>
	<div class="docs_content">
		{!! $docs !!}
	</div>
@endsection
