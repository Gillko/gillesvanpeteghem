<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Ik ben Gilles Vanpeteghem (°1990), een geboren en getogen Gentenaar. Sinds mijn jeugdjaren ben ik uitermate geïnteresseerd in alle computergerelateerde aspecten. In eerste instantie lag de nadruk op gaming en hardware. Later kreeg ik de smaak van het programmeren te pakken en besloot ik hiervan mijn beroep te maken.Sinds 2014 mag ik mij Bachelor in de Grafische en Digitale Media noemen, gespecialiseerd in Multimediaproductie ProDEV.Heeft u interesse in mijn profiel, wenst u mijn portfolio te bekijken of bent u net als ik een fervente pool- en/of snookerliefhebber? Aarzel dan niet om mij te contacteren via mail of onderstaande kanalen.">
		<meta name="keywords" content="gilles, vanpeteghem, gilko, html5, css3, laravel, cakephp, web, webdeveloper, developer">
		<!-- META FACEBOOK SHARE-->
		<meta property="og:title" content="Gilles Vanpeteghem" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.gillesvanpeteghem.be" />
		<meta property="og:description" content="Ik ben Gilles Vanpeteghem (°1990), een geboren en getogen Gentenaar. Sinds mijn jeugdjaren ben ik uitermate geïnteresseerd in alle computergerelateerde aspecten. In eerste instantie lag de nadruk op gaming en hardware. Later kreeg ik de smaak van het programmeren te pakken en besloot ik hiervan mijn beroep te maken." />
		<meta property="og:image" content="" />
		<meta property="og:image:url" content="{{ url('assets/img/gillesvanpeteghem_facebook.png') }}" />
		<title>Gilles Vanpeteghem</title>
		<link rel="shortcut icon" href="{{ url('../../assets/img/favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ url('../../assets/img/favicon.ico') }}" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="{{ url('../../assets/css/libraries/foundation/foundation.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ url('../../assets/css/libraries/foundation/foundation-icons/foundation-icons.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ url('../../assets/css/app.css') }}" rel="stylesheet" type="text/css">
		<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
		@yield('head')
	</head>
	<body>
		<div class="wrapper-gv">
			<!-- Responsive navigation -->
			<div class="top-bar-gv">
				<ul class="language">
					<li class="language">
						{{ Config::get('languages')[App::getLocale()] }}
					</li>
					@foreach (Config::get('languages') as $lang => $language)
						@if ($lang != App::getLocale())
							<li class="language">
								<a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
							</li>
						@endif
					@endforeach
				</ul>
				<div class="row">
					<div class="large-12">
						<div class="top-bar top-bar-gv">
							<div class="top-bar-left top-bar-left-gv">
								<a href="/">
									<h1 class="logo">GILVAN</h1>
								</a>
								<div class="title-bar title-bar-gv" data-responsive-toggle="example-menu" data-hide-for="medium">
									<button class="menu-icon menu-icon-gv" type="button" data-toggle></button>
								</div>
							</div>
							<div class="top-bar-right" id="example-menu">
								<ul class="dropdown menu menu-bottom-gv" data-dropdown-menu>
									@if (Auth::guest())
										<li>
											<a href="{{ url('/#expertise') }}">{{ trans('home.expertiseNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#skills') }}">{{ trans('home.skillsNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#interests') }}">{{ trans('home.interestsNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#about') }}">{{ trans('home.aboutNav') }}</a>
										</li>
									@else
										<li>
											<a href="{{ url('/#expertise') }}">{{ trans('home.expertiseNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#skills') }}">{{ trans('home.skillsNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#skills') }}">{{ trans('home.interestsNav') }}</a>
										</li>
										<li>
											<a href="{{ url('/#about') }}">{{ trans('home.aboutNav') }}</a>
										</li>
										<li class="">
											<a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
												{{ Auth::user()->user_username }} <span class=""></span>
											</a>

											<ul class="dropdown menu submenu-background-gv" data-dropdown-menu>
												<li>
													<a href="{{ url('/tutorials') }}">tutorials</a>
												</li>
												<li>
													<a href="{{ url('/videos') }}">videos</a>
												</li>
												<li>
													<a href="{{ url('/bookmarks') }}">bookmarks</a>
												</li>
												<li>
													<a href="{{ url('/tags') }}">tags</a>
												</li>
												<li>
													<a href="{{ url('/projects') }}">projects</a>
												</li>
												<li>
													<a href="{{ url('/blogs') }}">blogs</a>
												</li>
												<li>
													<a href="{{ url('/todos') }}">todos</a>
												</li>
												<li>
													<a href="{{ url('/diaries') }}">diaries</a>
												</li>
												<li>
													<a href="{{ url('/roles') }}">roles</a>
												</li>
												<li>
													<a href="{{ url('/images') }}">images</a>
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
			<div class="push-gv"></div>
		</div>
		@include('layouts.footer')
	
		<script src="{{ url('../../assets/js/libraries/jquery/jquery-1.12.1.min.js') }}"></script>
		<script src="{{ url('../../assets/js/libraries/foundation/foundation.min.js') }}"></script>
		<script src="{{ url('../../assets/js/libraries/foundation/app.js') }}"></script>
		<script src="{{ url('../../assets/js/app.js') }}"></script>
		@yield('bottom-scripts')
	</body>
</html>