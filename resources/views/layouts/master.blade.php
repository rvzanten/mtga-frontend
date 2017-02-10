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
			<h1>logo</h1>
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
    </body>
	<script type="text/javascript">
		var baseurl = "{{ $baseurl }}" ;
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/sha256.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-hex.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.js" type="text/javascript"></script>
	<script src="js/app.js" type="text/javascript"></script>
</html>
