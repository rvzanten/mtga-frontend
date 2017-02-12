<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Make Timestamping Great Again!</title>
		<link href="css/app.css" rel="stylesheet" type="text/css">
		<link href="css/main.css?rev={{ $revision }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
			<header class="widthCenter">
				<div class="logo">
					<h1>MTGA</h1>
					<small>Proof your trust</small>
				</div>
				<div class="nav">
					<a @if(Request::path() === '/')class="current"@endif href="{{ url('/') }}">Upload</a>
					<a @if(Request::path() === 'docs')class="current"@endif href="{{ url('/docs') }}">Docs</a>
				</div>
			</header>
            <div class="content widthCenter">
                @yield('content')
            </div>
			<footer class="widthCenter"></footer>
        </div>
		@yield('js')
    </body>
</html>
