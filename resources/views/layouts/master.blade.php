<html>
	<head>
		<title>dsTaskr</title>
	</head>
	<body>
		<h1>dsTaskr App</h1>
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/task-lists">My Task Lists</a></li>
			</ul>
		</nav>

		@if ( session('message'))
		<div class="flash-message">
			{!! session('message') !!}
		</div>
		@endif

		<div class="content">
			@yield('content')
		</div>

		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>

		 <script>
    		$(".delete").on("submit", function(){
        		return confirm("Are you sure you want to delete?");
    		});
		</script>

	</body>
</html>