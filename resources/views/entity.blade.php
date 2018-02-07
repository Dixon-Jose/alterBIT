<!DOCTYPE html>
<head>
  <title>alterBIT | The unconventional way of life</title>
  @extends('includes.fonts')
  <!-- @include('includes.navbar') -->
  <link rel="stylesheet/less" type="text/css" href="/css/main.less">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">

  <script src="/js/less.js" type="text/javascript">
  </script>
  <script>
  function getfocus() {
      document.getElementById("search").value="";
      document.getElementById("search").focus();

  }
  </script>
</head>
<body>
  <div class="row">
      <div class="col-12 menu-bar">
            <a title="alterbit-home" href="{{URL::to('/')}}">alterBiT<span> | The Unconventional Way of Life</span></a>
      </div>
      <!-- <div class="col-12 menu">
          <form method="get" action="{{ route('search') }}">
          <input type="search" placeholder="Search" id="search" name="q">
          </form>
      </div> -->
  </div>


      <div class="row">
          <div class="col-1"></div>
            <div class="col-10 src-page-bar">
                    <form method="get" action="{{ route('search') }}">
                    <input type="search" placeholder="Search" id="search" name="q">
                    </form>
            </div>
    </div>

<div class="row">
  <div class="col-2 element"></div>
    <div class="col-8 element">
            @if(isset($entity))
            <div class="card-img">
                <img src={{$entity->imgurl}}>
            </div>
            <h2>{{$entity->name}}</h2>
            <p title="entity">{{$entity->description}}</p>
            @endif
            <hr/>
    </div>
</div>

<div class="row">
    <div class="col-12 partition">
          <h2>The Alternatives are:</h2>
    </div>
</div>
<div class="row">
    <div class="col-12 alter">
        <div class="col-2"></div>
        @foreach($alternatives as $alternative)
            <div class="col-2 card">
                <h3>{{$alternative['name']}}</h3>
                <p>  {{substr($alternative['description'],0,100)}}</p>
                <a href="{{route('entity',['id'=> $alternative['id']])}}">Check out</a>
            </div>
            @endforeach
      </div>
    </div>


    <div class="row">
      <div class="col-2"></div>
        <div class="col-8"></div>
    </div>

<div class="row">
  <div class="col-2"></div>
    <div class="col-8"><hr/></div>
</div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-8 comment" name="entity-page">
          <h4>Responses</h4>
          <form>
                <textarea placeholder="Enter response" ></textarea>
          </form>
  </div>
</div>


      <div class="row footer">
          <div class="col-10 footer" >
              <p>Designed by: <a href="">&nbsp;Aniruddha</a>&nbsp;and<a href="https://github.com/Dixon-Jose" target="_blank">&nbsp;Dixon</a></p>
          </div>
          <div class="col-2 footer">
              <a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a>
          </div>
      </div>

        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
</body>
</html>
