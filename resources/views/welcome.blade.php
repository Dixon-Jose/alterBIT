<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <title>alterBIT | The unconventional way of life</title>
        <!-- Fonts -->
        @extends('user_pages.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript">
        </script>
        <!-- script -->
        <script>
        function getfocus() {
            document.getElementById("search").value="";
            document.getElementById("search").focus();

        }
        </script>



    </head>
    <body>
         <input type="button" onclick="getfocus()" value="alterBiT" >


                <div class="search">
                  <form method="post" action="{{ route('Home_Page') }}">
                        {{ csrf_field() }}
                        <input type="text" id="search" name="entity" placeholder="Search for an unconventional way of life">
                  </form>
                </div>

    </body>
</html>
