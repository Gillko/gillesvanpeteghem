<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link href="../resources/assets/css/app.css" rel="stylesheet" type="text/css">

        <link href="../resources/assets/css/libraries/foundation/foundation.min.css" rel="stylesheet" type="text/css">

        <style>
            .content {
                text-align: center;
                display: inline-block;
            }
            .title {
                font-family: 'Lato';
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <!-- Responsive navigation -->
        <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Gilles Vanpeteghem</div>
        </div>
      
        <div class="top-bar" id="example-menu">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="menu-text">GV</li>
                    <li>
                        <a href="#">Who</a>
                        <ul class="menu vertical">
                            <li><a href="#">Who First</a></li>
                            <li><a href="#">Who Second</a></li>
                            <li><a href="#">Who Third</a></li>
                        </ul>
                    </li>
                    <li><a href="#">What</a></li>
                    <li><a href="#">Why</a></li>
                    <li><a href="#">When</a></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><input type="search" placeholder="Search"></li>
                    <li><button type="button" class="button">Search</button></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <!-- <div class="title small-4 columns">Laravel Gilles Vanpeteghem</div> -->
                <div class="title">Laravel Gilles Vanpeteghem</div>
            </div>
        </div>
        <script src="../resources/assets/js/libraries/jquery/jquery-1.12.1.min.js"></script>
        <script src="../resources/assets/js/libraries/foundation/foundation.min.js"></script>
        <script src="../resources/assets/js/libraries/foundation/app.js"></script>
    </body>
</html>
