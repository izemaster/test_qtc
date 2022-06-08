<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

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
        <form action="#">
            <div class="form-group">
                <input type="text" class="form-control" name="word_1" placeholder="Palabra 1">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="word_2"placeholder="Palabra 2">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="word_3"placeholder="Palabra 3">
            </div>
            <button type="submit">Enviar</button>
        </form>
        @if(isset($resultado))
            @if($resultado)
            <div class="alert alert-success" role="alert">
            Las palabras son amigas
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                Las palabras NO son amigas
                </div>
            @endif
        @endif
    </body>
</html>
