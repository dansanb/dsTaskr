<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dsTaskr App</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/logo-nav.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ URL::asset('images/logo.png') }}" alt="dsTaskr Logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Welcome</a>
                    </li>
                    @if (!Auth::guest())
                    <li>
                        <a href="/task-lists">My Task Lists</a>
                    </li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
	                	<li><a href="{{ route('login') }}">Login</a></li>
		                <li><a href="{{ route('register') }}">Register</a></li>
					@else
	                	<li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                            {{ Auth::user()->name }} <span class="caret"></span>
	                        </a>

	                        <ul class="dropdown-menu" role="menu">
	                            <li>
	                                <a href="{{ route('logout') }}"
	                                    onclick="event.preventDefault();
	                                             document.getElementById('logout-form').submit();">
	                                    Logout
	                                </a>

	                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                    {{ csrf_field() }}
	                                </form>
	                            </li>
	                        </ul>
	                    </li>
                	@endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12">
				@if ( session('message'))
				<div class="alert alert-info">
					{!! session('message') !!}
				</div>
				@endif
    		</div>
    	</div>

        <div class="row">
            <div class="col-lg-12">
				@yield('content')
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>

		 <script>

		 	// delete confirmation - ask before submitting delete request
    		$(".delete").on("submit", function(){
        		return confirm("Are you sure you want to delete?");
    		});


    		// show / hide hidden row items
    		$('#show-hide-completed').on('click', function($this) {
    			$('.table tr.success').toggleClass('hidden');

    			// toggle spans that describe the actions of the button (show/hide)
    			$('#show-hide-completed span.toggle').toggleClass('hidden');
    		});

		</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>