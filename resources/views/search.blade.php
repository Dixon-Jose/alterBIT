<!DOCTYPE html>
<html lang="en">
<head>
  <title>alterBIT|Search</title>
  @extends('includes.fonts')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" type="text/css" href="/css/main.less">
      <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">

    <script src="/js/less.js" type="text/javascript">
    </script>
</head>
<body>

    <div class="row">
        <div class="col-12 menu-bar">
              <a title="alterbit-home" href="{{URL::to('/')}}">alterBiT<span> | The Unconventional Way of Life</span></a>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
          <div class="col-10 src-page-bar">
                  <form method="get" action="{{ route('search') }}">
                  <input type="search" placeholder="Search" id="search" name="q">
                  </form>
          </div>
  </div>

@foreach($entities as $entity)
  <div class="row">
        <div class="col-1"></div>
        <div class="col-10 src-tags">
            <!-- <p>Tags:</p> -->
              @foreach($entity->tags as $tags)
              <a href="">{{$tags}}</a>
              @endforeach
        </div>
  </div>
  @endforeach
<br>
<div class="row">
  <div class="col-1"></div>
    <div class="col-6 src-head">
          <h3>Results</h3>
    </div>
</div>

  @foreach($entities as $entity)
  <div class="row " >
      <div class="col-1"></div>
      <a href="{{route('entity',['id'=> $entity->_id])}}">
          <div class="col-6 search-result">
                  <div class="src-img"><img src="{{$entity->imgurl }}"></div>
                  <h2>{{$entity->name}}</h2>
                  <p>{{substr($entity->description,0,100)}}</p>
          </div>
      </a>
  </div>
  @endforeach

<div class="row footer" name="src-foot">
      <div class="col-10 footer" >
          <p>Designed by: <a href="">&nbsp;Aniruddha</a>&nbsp;and<a href="https://github.com/Dixon-Jose">&nbsp;Dixon</a></p>
      </div>
      <div class="col-2 footer">
          <a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a>
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
        </script>
</body>
</html>
