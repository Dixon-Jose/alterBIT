<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>alterBIT | The unconventional way of life</title>
        <!-- Fonts -->
        @extends('includes.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript"></script>

    </head>
    <body>
      <div class="row home-links">
            <div class="col-1 "></div>
            <div class="col-10">
              <table>
                <tr>
                    <th><a href="">Forum</a></th>
                    <th><a href="">Suggest</a></th>
              </tr>
            </table>
            </div>
            <div class="col-1 "></div>
      </div>

      <div class="row">
        <div class="col-5 src"></div>
        <div class="col-3 src">
         <input type="button" class="welcome-search" onclick="getfocus()" value="alterBiT">
     </div>
   </div>

   <div class="row logo">
      <div class="col-4"></div>
      <div class="col-5">
            <h4>{ The Unconventional Way of Life }</h4>
      </div>
      <div class="col-3"></div>
   </div>

   @if(isset($message))
   <div class="row">
          <div class="col-4"></div>
                  <div class="col-5 message">
                    <p title="message">{{$message}}</p>
                  </div>
          <div class="col-3"></div>
  </div>
  @endif

     <div class="row">
       <div class="col-2"></div>
           <div class="col-8 search">
             <form method="get" action="{{ route('search') }}">
                   <input type="text" id="search" name="q" placeholder="Search.">
             </form>
           </div>
           <div class="col-2"></div>
        </div>

        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script>
            function getfocus() {
                document.getElementById("search").value="";
                document.getElementById("search").focus();
            }
        </script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
    </body>
</html>
