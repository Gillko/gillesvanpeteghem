<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gilles Vanpeteghem</title>
		<link rel="shortcut icon" href="{{ url('../resources/assets/img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ url('../resources/assets/img/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ url('../resources/assets/css/libraries/foundation/foundation.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('../resources/assets/css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<!-- Responsive navigation -->
			<div class="title-bar title-bar-center title-bar-background" data-responsive-toggle="example-menu" data-hide-for="medium">
				<div class="title-bar-title title-bar-title-gv">
					<a href="/">
						<h1 class="logo">GILVAN</h1>
					</a>
				</div>
				<button class="menu-icon menu-icon-gv" type="button" data-toggle></button>
			</div>
			<div class="top-bar-background">
				<div class="row">
					<div class="large-12">
						<div class="top-bar top-bar-background" id="example-menu">
							<div class="top-bar-left">
							<a href="/">
								<h1 class="logo">GILVAN</h1>
								</a>
							  </div>
							  <div class="top-bar-right top-bar-background">
								<ul class="dropdown menu menu-bottom" data-dropdown-menu>
									@if (Auth::guest())
										<li>
	                                        <a href="{{ url('/#expertise') }}">expertise</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#skills') }}">skills</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#interests') }}">interests</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#about') }}">about</a>
	                                    </li>
									@else
										<li>
	                                        <a href="{{ url('/#expertise') }}">expertise</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#skills') }}">skills</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#skills') }}">interests</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ url('/#about') }}">about</a>
	                                    </li>
										<li class="">
											<a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
												{{ Auth::user()->name }} <span class=""></span>
											</a>

											<ul class="dropdown menu submenu-background-gv" data-dropdown-menu>
												<li>
													<a href="{{ url('/bookmarks') }}">bookmarks</a>
												</li>
												<li>
													<a href="{{ url('/categories') }}">categories</a>
												</li>
												<li>
													<a href="{{ url('/types') }}">types</a>
												</li>
												<li>
													<a href="{{ url('/logout') }}">Logout</a>
												</li>
											</ul>
										</li>
									@endif
								</ul>
							  </div>
						</div>
					</div>
				</div>
			</div>
			@yield('content')
		</div>
		<div class="push"></div>
    </div>
    @yield('footer')
	<script src="{{ url('../resources/assets/js/libraries/jquery/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ url('../resources/assets/js/libraries/foundation/foundation.min.js') }}"></script>
    <script src="{{ url('../resources/assets/js/libraries/foundation/app.js') }}"></script>
    <script src="{{ url('../resources/assets/js/app.js') }}"></script>
</body>
</html>