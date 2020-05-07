<?php 
use App\Plataforma;
use App\Juego;
use App\Torneo;

$plataformas = Plataforma::all();
$juegos = Juego::all();
$torneos = Torneo::all();
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Revoluxion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <header id="inicio">
            <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{url('/registrogamer') }}">Registrarse como Gamer</a>
                        @endif
                    @endauth
                </div>
            @endif

                <div class="title m-b-md">
                    Revoluxion
                </div>

                <div class="links">
                    <a href="#inicio">Inicio</a>
                    <a href="#plataformas">Plataformas</a>
                    <a href="#juegos">Juegos</a>
                    <a href="#ubicacion">Ubicación</a>
                    <a href="#contacto">Contacto</a>
                    <a href="#torneos">Torneos</a>
                </div>
            </div>
        </header>
                <div class="container" id="plataformas">
                    <h1 style="text-align: center;">Plataformas</h1>
                    <div style="display: flex; margin-left: 5%; margin-right: 5%;">
                        <img src="{{ asset('images/consolas.jpg') }}" style="width: 50%; height: 50%;">
                        <div>
                            <p>
                                En Revoluxion Gaming Center contamos con las consolas de última generación para que puedas disfrutar tu visita al máximo. Dentro de las plataformas con las que contamos se encuentra:
                                <ul>
                                <?php 
                                    foreach ($plataformas as $p) {
                                        echo "<li>$p->nombre</li>";
                                    }
                                ?>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>

             <br>

                <div class="container" id="juegos">
                    <h1 style="text-align: center;">Juegos</h1>
                    <div style="display: flex; margin-left: 5%; margin-right: 5%;">
                        <img src="{{ asset('images/juegos.jpg')}}" style="width: 50%; height: 49%;">
                        <div>
                            <p>
                                Contamos con los siguientes títulos:
                                <ul>
                                    <?php 
                                    foreach ($juegos as $j) {
                                        echo "<li>$j->titulo</li>";
                                    }
                                     ?>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="ubicacion" style="text-align: center;">
                    <h1>Ubicacion</h1>
                    <p>
                        Recuerda que nos ubicamos tras el Hospital General, en Pamoranes #345 altos Col. Revolución Verde arriba de Boutique Kutik.
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9988647286605!2d-99.13898398548875!3d23.747419894808115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x867953e3725dea45%3A0xe1f668ce1527265a!2sRevoluxion%20Gaming%20Center!5e0!3m2!1ses!2smx!4v1586842578623!5m2!1ses!2smx" width="1000" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </p>
                </div>

                <div id="contacto" style="text-align: center;">
                    <h1>Contacto</h1>
                    <p>
                        Teléfono: 834 248 7367
                    </p>
                </div>

                <div id="torneos" style="margin-bottom: 5%; text-align: center;">
                    <h1>Torneos</h1>
                    <?php 
                    if (!empty($torneos)) {
                        echo "<ul>";
                        foreach ($torneos as $p) {
                            echo "<li>$p->titulo</li>";
                        }
                        echo"</ul>";
                    } else {
                        echo "<p>No hay torneos</p>";
                    }
                    ?>
                </div>
    </body>
</html>
