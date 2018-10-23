@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="background-box-one-gv">
				<div class="row">
					<div class="large-12 column quote-gv">
						<h1 class="quote-who-gv">{{ trans('home.title') }}</h1>
						<p class="underline-gv">&nbsp;</p>
					</div>
				</div>
				<div class="row">
					<div class="large-12 column quote-gv">
						<h1 class="quote-actual-gv">They don't make bugs like <br/> bunny anymore.</h1>
						<p>Olav Mjelde</p>
					</div>
				</div>
			</div>
			<div class="blue-box-gv">
				<div class="row">
					<div class="large-2 medium-4 small-8 large-uncentered medium-centered small-centered column title-gv color-white-gv">
						<h1 id="expertise">{{ trans('home.expertiseTitle') }}</h1>
					</div>
				</div>
			</div>
			<div class="background-splitter-expertise-gv">
				<div class="row">
					<div class="large-6 medium-6 column expertise-gv gray-light-box-gv">
						<div class="row fullWidth-gv">
							<div class="large-12 medium-12 column large-uncentered medium-centered small-centered">
								<h1 class="development-gv">{{ trans('home.developmentTitle') }}</h1>
								<p>{{ trans('home.development') }}</p>
								<ul>
									<li>{{ trans('home.developmentItemOne') }}</li>
									<li>{{ trans('home.developmentItemTwo') }}</li>
									<li>{{ trans('home.developmentItemThree') }}</li>
									<li>{{ trans('home.developmentItemFour') }}</li>
								</ul>
							</div> 
						</div>
					</div>
					<div class="large-6 medium-6 column expertise-gv gray-lighter-box-gv">
						<div class="row fullWidth-gv">
							<div class="large-10 medium-12 column large-centered medium-centered small-centered">
								<h1 class="hardware-gv">{{ trans('home.hardwareTitle') }}</h1>
								<p>{{ trans('home.hardware') }}</p>
								 <ul>
									<li>{{ trans('home.hardwareItemOne') }}</li>
									<li>{{ trans('home.hardwareItemTwo') }}</li>
									<li>{{ trans('home.hardwareItemThree') }}</li>
									<li>{{ trans('home.hardwareItemFour') }}</li>
									<li>{{ trans('home.hardwareItemFive') }}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="white-box-gv">
				 <div class="row">
					<div class="large-3 medium-5 small-9 large-centered medium-centered small-centered column title-gv color-blue-gv">
						<h1 id="skills">{{ trans('home.skillsTitle') }}</h1>
					</div>
				</div>
				 <div class="row">
				 	<div class="large-10 medium-10 small-5 large-centered medium-centered small-centered column skills-gv">
						<img src="../../assets/img/html-5.png" class="html5-gv" alt="html 5">
						<img src="../../assets/img/css-3.png" class="css3-gv" alt="css 3">
						<img src="../../assets/img/sass.png" class="sass-gv" alt="sass">
						<img src="../../assets/img/foundation.png" class="foundation-gv" alt="foundation">
						<img src="../../assets/img/laravel.png" class="laravel-gv" alt="laravel">
						<img src="../../assets/img/twitter-bootstrap.png" class="bootstrap-gv" alt="twitter bootstrap">
						<img src="../../assets/img/mysql.png" class="mysql-gv" alt="mysql">
						<img src="../../assets/img/jquery.png" class="jquery-gv" alt="jquery">
						<img src="../../assets/img/less.png" class="less-gv" alt="less">
						<img src="../../assets/img/cake-php.png" class="cakephp-gv" alt="cakephp">
					</div>
				</div>
			</div>
			<div class="background-box-gv background-box-two-gv">
				 <div class="row">
					<div class="large-8 medium-8 small-7 large-centered medium-centered small-centered column quote-gv">
						<h1 class="quote-actual-gv">The only sure way to make a computer go faster is to throw it out the window.</h1>
						<p>~ Anonymous ~</p>
					</div>
				</div>
			</div>
			<div class="white-box-gv">
				 <div class="row">
					<div class="large-3 medium-4 small-8 large-centered medium-centered small-centered column title-gv color-blue-gv">
						<h1 id="projects">{{ trans('home.projectsTitle') }}</h1>
					</div>
				</div>
				<div class="row projects-gv">
					<div class="large-4 column row-padding-bottom-gv">
						<a href="http://www.snookview.be" target="_blank">
							<div class="project-text-gv snookview-gv">
								<div class="project-gv gray-light-box-gv">
									<p>snookview</p>
								</div>
							</div>
						</a>
					</div>
					<div class="large-4 column row-padding-bottom-gv">
						<a href="http://www.gillesvanpeteghem.be" target="_blank">
							<div class="project-text-gv gillesvanpeteghem-gv">
								<div class="project-gv gray-lighter-box-gv">
									<p>gilles vanpeteghem</p>
								</div>
							</div>
						</a>
					</div>
					<div class="large-4 column row-padding-bottom-gv">
						<a href="http://www.olipoli.be" target="_blank">
							<div class="project-text-gv olipoli-gv">
								<div class="project-gv gray-light-box-gv">
									<p>olipoli</p>
								</div>
							</div>
						</a>
					</div>
					<div class="large-12 column row-padding-bottom-gv">
						<a href="http://www.elinedelasorte.be" target="_blank">
							<div class="project-text-gv elinedelasorte-gv">
								<div class="project-gv gray-lighter-box-gv">
									<p>eline delasorte</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="background-box-gv background-box-three-gv">
				 <div class="row">
					<div class="large-8 medium-8 small-7 large-centered medium-centered small-centered column quote-gv">
						<h1 class="quote-actual-gv">The question of whether computers can think is like the question of whether submarines can swim.</h1>
						<p>~ Edsger W. Dijkstra ~</p>
					</div>
				</div>
			</div>
			<div class="white-box-gv">
				<div class="row">
					<div class="large-3 medium-4 small-8 large-uncentered medium-centered small-centered column title-gv color-blue-gv">
						<h1 id="interests">{{ trans('home.interestsTitle') }}</h1>
					</div>
				</div>
				 <div class="row">
					<div class="large-12 large-centered column interest-text-gv">
						<p>{{ trans('home.interests') }}</p>
					</div>
				</div>
				 <div class="row interests-gv">
					<div class="large-4 medium-4 column row-padding-bottom-gv">
						<div class="image-text-gv friends-gv">
							<div class="image-gv">
								<img src="../../assets/img/friends.png" alt="friends">
							</div>
						</div>
					</div>
					<div class="large-8 medium-8 column">
						<div class="row row-padding-bottom-gv">
							<div class="large-12 column">
								<div class="image-text-gv snooker-gv">
									<div class="image-gv">
										<img src="../../assets/img/snooker.png" alt="snooker">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 medium-6 column row-padding-bottom-gv">
								<div class="image-text-gv aion-gv">
									<div class="image-gv">
										<img src="../../assets/img/aion.png" alt="aion">
									</div>
								</div>
							</div>
							<div class="large-6 medium-6 column">
								<div class="image-text-gv multimedia-gv">
									<div class="image-gv">
										<img src="../../assets/img/multimedia.png" alt="multimedia">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="background-splitter-about-gv">
				<div class="background-about-gv about-gv color-white-gv">
					<div class="row">
						<div class="large-2 medium-3 small-7 column large-uncentered  medium-centered  small-centered title-gv color-white-gv">
							<h1 id="about">{{ trans('home.aboutTitle') }}</h1>
						</div>
					</div>
					<div class="row">
						<div class="large-5 column about-information-gv">
							<p>{{ trans('home.aboutParagraphOne') }}</p>
							<p>{{ trans('home.aboutParagraphTwo') }}</p>
							<p>{{ trans('home.aboutParagraphThreePartOne') }} <a href="mailto:gilles_vanpeteghem@hotmail.com">e-mail</a> {{ trans('home.aboutParagraphThreePartTwo') }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="socialBox blueDarker">
				<div class="row">
					<div class="large-12 medium-12 small-12 column social-gv">
						<div class="social-text-gv">
							<h1>Let's get social!</h1>
							<img src="../../assets/img/arrow.png" alt="Gilles Vanpeteghem">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection