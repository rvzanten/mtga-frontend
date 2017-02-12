@extends('layouts.master')

@section('title', 'Upload')

@section('content')
    <h2>Visualizer</h2>
	<div class="selected_node"></div>
	<button class="resetTree">&laquo; Reset</button>
	<div class="tree">
		<div class="pop_container">
			<input type="text" placeholder="Enter your proof of publication hash here"/>
			<button class="visualize">Visualize</button>
		</div>
	</div>
@endsection

@section('js')
	<script src="http://visjs.org/dist/vis.js" type="text/javascript" ></script>
	<script src="http://visjs.org/examples/network/exampleUtil.js" type="text/javascript" ></script>
	<link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" >
	<script src="js/visualizer.js?rev={{ $revision }}" type="text/javascript"></script>
@endsection
