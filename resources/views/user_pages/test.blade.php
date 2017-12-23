<!doctype html>
<html lang="{{ app()->getLocale() }}">

<?php $name='alterB1T';?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>alterBIT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight:normal;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            input[type=text] {
                  width: 75px;
                  box-sizing: border-box;
                  border: 1.75px solid #636b6f;
                  border-radius: 4px;
                  font-size: 16px;
                  color: #fff;
                  background-color: #fff;
                  background-position: cover 15px 10px;
                  background-repeat: no-repeat;
                  padding: 12px 20px 12px 40px;
                  -webkit-transition: width 0.4s ease-in-out;
                  transition: width 0.4s ease-in-out;

                }

      input[type=text]:focus {
            border: 2px solid #636b6f;
            width: 100%;
            color: black;

          }

        </style>
    </head>
    <body>
        <h1>{{ $posts['head']}}</h1>

        <p>{{ $posts['para']}}</p>




    </body>
</html>
