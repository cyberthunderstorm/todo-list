<!DOCTYPE html>
<html>
<head>
	<title>Business planner</title>
	<style>
		html,body {
			margin: 0;
			padding: 0;
			font-family: verdana;

		}

		* {
			margin: 0;
			padding: 0;
		}


		header {
			background: whitesmoke;
			padding: 10px 0 10px 0;
			margin-bottom: 20px;
		}

		.form-horizontal{
			margin: auto;
			max-width: 750px;
			border: solid 1px lightgray;
			border-radius: 10px;
		}

		.form-group {
			width: 90%;
			margin: auto;
		}

		.form-group > div {
			width: 100%;
		}

		label {
			font-weight: bold;
		}

		input[type="text"] {
			height: 30px;
			width: 100%;
			border: solid 1px lightgray;
			border-radius: 5px;
			outline: none;
			padding: 5px;
			font-size: large;
		}

		.form-header, .panel-heading {
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			width: 99%;
			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			background: whitesmoke;
			font-family: verdana;
			font-size: 1.15rem;

		}

		button {
			font-family: verdana;
			font-size: 15px;
			margin: 10px;
			margin-left: 0px;
		}

		ul {
			list-style-type: none;
		}

		.btn-default {
			background: whitesmoke;
			background: transparent;
			border: solid 1px lightgray;
		}

		.alert {
			background: lightcyan;
			padding: 10px;
			border-radius: 10px;
			max-width: 500px;
			margin: 10px;
		}
	</style>
</head>
<body>
	<header>
		<div class="title">
			<h2>Task Planner</h2>
		</div>
	</header>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>