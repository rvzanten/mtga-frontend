@extends('layouts.master')

@section('title', 'Upload')

@section('content')
    <h2>Visualizer</h2>
	<div id="selected_node"></div>
	<div id="tree">
		<button>Meggelize</button>
	</div>
@endsection

@section('js')
	<script src="http://visjs.org/dist/vis.js" type="text/javascript" ></script>
	<script src="http://visjs.org/examples/network/exampleUtil.js" type="text/javascript" ></script>
	<link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" >
	<script src="js/visualizer.js" type="text/javascript"></script>
@endsection
