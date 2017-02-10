<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOE GAAN WE HET NOEMEN?</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

			header{
				height: 50px;
			}

			header > h1{
				width: 200px;
				border: 1px solid gray;
				height: 90%;
				text-align: center;
				padding: 0;
				margin: 0;
				margin-top: 10px;
			}

			.contentProps{
				margin-left: auto;
				margin-right: auto;
				width: 80%;
			}

            .container {
				margin-top: 30px;
				width: 100%;
				height: 100%;
            }
            .content {
				height: 80%;
                text-align: center;
				border: 1px solid #efefef;
            }

			.nav{
				margin-left: auto;
				margin-right: auto;
				width: 80%;
				height: 30px;
			}

            .nav > a {
                color: #636b6f;
                padding-top: 5px;
				padding-left: 25px;
				padding-right: 25px;
				border-left: 1px solid #efefef;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

			.nav > a:nth-of-type(1){
				border-left: none;
			}

			footer{
				background-image: url(https://bitonic.nl/public/img/Bitonic-logo.svg);
				background-repeat: no-repeat;
				background-position: right;
				height: 15px;
				margin-top: 10px;
			}
        </style>
    </head>
    <body>
		<header class="contentProps">
			<h1>logo</h1>
		</header>
        <div class="container">
			<div class="nav contentProps">
				<a href="{{ url('/') }}">Upload</a>
				<a href="{{ url('/docs') }}">Docs</a>
				<a href="{{ url('/visualizer') }}">Visualizer</a>
			</div>
            <div class="content contentProps">
                @yield('content')
            </div>
			<footer class="contentProps"></footer>
        </div>
    </body>
</html>
