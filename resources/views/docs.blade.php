@extends('layouts.master')

@section('title', 'Docs')

@section('content')
    <h2>Docs</h2>
	<div class="docs_content widthCenter">
		{!! $docs !!}
	</div>
@endsection
