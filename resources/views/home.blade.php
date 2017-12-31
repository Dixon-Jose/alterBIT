<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <title>alterBIT | The unconventional way of life</title>
        <!-- Fonts -->
        @extends('includes.fonts')
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

      <div class="row">
        <div class="col-5 src"></div>
        <div class="col-3 src">
         <input type="button" class="welcome-search" onclick="getfocus()" value="alterBiT">
     </div>
   </div>
   @if(isset($message))
   <h3>{{$message}}</h3>
    @endif

     <div class="row">
           <div class="col-12 search">
             <form method="get" action="{{ route('search') }}">
                   {{ csrf_field() }}
                   <input type="text" id="search" name="entity" placeholder="Search.">
             </form>
           </div>
        </div>
    </body>
</html>
