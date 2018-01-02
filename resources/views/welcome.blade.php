<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>alterBIT | The unconventional way of life</title>
        @extends('partials.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript"></script>
        <script>
            function getfocus() {
                document.getElementById("search").value="";
                document.getElementById("search").focus();
            }
        </script>
    </head>
    <body>
        <div class="row">
              <div class="col-5 src"></div>
              <div class="col-3 src">
                  <input type="button" id="welcome-search" onclick="getfocus()"value="alterBiT">
              </div>
        </div>
        <div class="row">
             <div class="col-12 search">
                 <form method="post" action="{{ route('Home_Page') }}">
                          {{ csrf_field() }}
                          <input type="text" id="search" name="entity" placeholder="Search.">
                 </form>
             </div>
        </div>

              <script type="text/javascript" src="../jquery-3.2.1.js"></script>
              <script type="text/javascript" src="../jquery-learn.js"></script>
    </body>
</html>
