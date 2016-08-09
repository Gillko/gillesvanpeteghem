@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="content">
        <div class="backgroundbox">
            <div class="row">
                <div class="quote large-12 column">
                    <h1 class="blueDarker" id="who">I'm a webdeveloper</h1>
                    <h1 class="white actual-quote">They don't make bugs like <br/> bunny anymore.</h1>
                    <p class="white">Olav Mjelde</p>
                </div>
            </div>
        </div>
        <div class="grayBox">
            <div class="row">
                <div class="title large-2 column">
                    <h1 id="work">Work</h1>
                </div>
            </div>
            <div class="row">
                <div class="large-12 column">
                    <p>Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear. Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear.</p>
                </div>
            </div>
            <div class="row">
                <div class="part large-4 column">
                    <h1 class="part-light">Design</h1>
                </div>
                <div class="part large-4 column">
                   <h1 class="part-dark">Development</h1>
                </div>
                <div class="part large-4 column">
                    <h1 class="part-light">SEO/SEA</h1>
                </div>
            </div>
        </div>
        <div class="whiteBox">
             <div class="row">
                <div class="title large-3 column">
                    <h1 id="inspiration">Inspiration</h1>
                </div>
            </div>
            <div class="row">
                <div class="large-12 column">
                    <p> Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear. Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear.</p>
                </div>
            </div>
            <div class="row">
                <div class="box large-4 medium-4 small-12 column">
                     <img src="../resources/assets/img/box.png" class="box">
                </div>
                <div class="box large-4 medium-4 small-12 column">
                   <img src="../resources/assets/img/box.png" class="box">
                </div>
                <div class="box large-4 medium-4 small-12 column">
                    <img src="../resources/assets/img/box.png" class="box">
                </div>
            </div>
            <div class="row">
                <div class="box large-4 medium-4 small-12 column">
                  <img src="../resources/assets/img/box.png" class="box">
                </div>
                <div class="box large-4 medium-4 small-12 column">
                    <img src="../resources/assets/img/box.png" class="box">
                </div>
                <div class="box large-4 medium-4 small-12 column">
                    <img src="../resources/assets/img/box.png" class="box">
                </div>
            </div>
        </div>
        <div class="blueBox about colorWhite">
            <div class="row">
                <div class="title large-2 column">
                    <h1 id="about">About</h1>
                </div>
            </div>
            <div class="row">
                <div class="large-4 column">
                    <p> Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear. Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear.</p>
                    <p> Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear. Eros menandri deseruisse sed ne, esse consetetur appellantur sit eu. Eu mundi dicam scripta eam, ex brute corrumpit omittantur per. Ius ea tantas prodesset, enim praesent te vis. Eu facilis oportere repudiandae mea, no harum suavitate per. In quando detracto prodesset vel, no usu dicant verear.</p>
                </div>
            </div>
        </div>
        <div class="socialBox blueDarker">
            <div class="row">
                <div class="large-12 medium-12 small-12 column social">
                    <div class="social-test">
                        <h1>Let's get social!</h1>
                        <img src="../resources/assets/img/arrow.png" alt="Gilles Vanpeteghem">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
