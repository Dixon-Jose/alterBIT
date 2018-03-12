  @extends('layouts.app')
  @section('title','The Unconventional Way Of Life')

  @section('content')


      <div class="row home-links">
            <div class="col-1 "></div>
            <div class="col-10">
              <table>
                <tr>
                    <th><a href="" id="src">Search</a></th>
                    <th><a href="{{ route('suggest') }}">Suggest</a></th>
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


        <script>
            function getfocus() {
                document.getElementById("search").value="";
                document.getElementById("search").focus();
            }
        </script>

@endsection
