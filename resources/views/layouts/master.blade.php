<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOE GAAN WE HET NOEMEN?</title>
		<link href="css/app.css" rel="stylesheet" type="text/css">
		<link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<header class="widthCenter">
			<h1></h1>
			<small onclick="alert('cee76b3f7949345506573e872691902adce071a1fd563f9bff7d2888583c644d')">cee76b3f7949345506573e872691902adce071a1fd563f9bff7d2888583c644d</small>
		</header>
        <div class="container">
			<div class="nav widthCenter">
				<a href="{{ url('/') }}">Upload</a>
				<a href="{{ url('/docs') }}">Docs</a>
				<a href="{{ url('/visualizer') }}">Visualizer</a>
			</div>
            <div class="content widthCenter">
                @yield('content')
            </div>
			<footer class="widthCenter"></footer>
        </div>
		@yield('js')
    </body>
</html>
