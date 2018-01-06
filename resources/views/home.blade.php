<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>alterBIT | The unconventional way of life</title>
        <!-- Fonts -->
        @extends('includes.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript"></script>
    </head>
    <body>

      <div class="row">
        <div class="col-5 src"></div>
        <div class="col-3 src">
         <input type="button" class="welcome-search" onclick="getfocus()" value="alterBiT">
     </div>
   </div>

   <div class="row">
          <div class="col-4"></div>
          <div class="col-5">
                @if(isset($message))
                <h3 title="message">{{$message}}</h3>
                @endif
          </div>
          <div class="col-3"></div>
  </div>
     <div class="row">
           <div class="col-12 search">
             <form method="get" action="{{ route('search') }}">
                   <input type="text" id="search" name="q" placeholder="Search.">
             </form>
           </div>
        </div>
        <script>
            function getfocus() {
                document.getElementById("search").value="";
                document.getElementById("search").focus();
            }
        </script>
    </body>
</html>
