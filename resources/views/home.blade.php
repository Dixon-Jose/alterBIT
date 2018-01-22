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
            <div class="col-1 ">
                  <a href="" title="forum">Forum</a>
            </div>
            <div class="col-10"></div>
            <div class="col-1">
                    <a href="{{URL::to('insert')}}" title="insert">Insert</a>
            </div>
      </div>

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
        </script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
    </body>
</html>
