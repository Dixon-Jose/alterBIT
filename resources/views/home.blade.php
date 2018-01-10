<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>alterBIT | The unconventional way of life</title>
        <!-- Fonts -->
        @extends('includes.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript"></script>
        <script src="../jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../jquery/myjquery.js" type="text/javascript"></script>

    </head>
    <body>
      <script>
      </script>

      <div class="row">
        <div class="col-5 src"></div>
        <div class="col-3 src">
         <input type="button" class="welcome-search" onclick="getfocus()" value="alterBiT">
     </div>
   </div>

   @if(isset($message))
   <div class="row">
          <div class="col-4"></div>
                  <div class="col-5 search-mess">
                    <p title="message">{{$message}}</p>
                  </div>
          <div class="col-3"></div>
  </div>
  @endif

     <div class="row">
           <div class="col-12 search">
             <form method="get" action="{{ route('search') }}">
                   <input type="text" id="search" name="q" placeholder="Search.">
             </form>
           </div>
        </div>
        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script>
            function getfocus() {
                document.getElementById("search").value="";
                document.getElementById("search").focus();
            }
    $( "#search" ).autocomplete({
        source: "{{route('autocomplete')}}",
        select: function(event,ui){
            window.location.href="{{route('search')}}?q=" + ui.item.value;
        }
    });

  $( function() {
              $( ".search-mess" ).dialog({
                draggable:false,
                resizable:false,
                modal:true
              });

      } );
        </script>
    </body>
</html>
