<!DOCTYPE html>
<html lang="en">
<head>
  <title>alterBIT|Search</title>
  @extends('includes.fonts')
  @include('includes.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" type="text/css" href="/css/main.less">
    <script src="/js/less.js" type="text/javascript">
    </script>
</head>
<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10 src-page">
                  <h1>Search results:</h1>
        </div>
    </div>

    @foreach($entities as $entity)
    <div class="row " style="padding:1.5%;">
        <div class="col-2"></div>
        <div class="col-5 search-result">
          <img src={{$entity->imgurl}}>
              <h2>{{$entity->name}}</h2>
              <p>{{$entity->description}}</p>
              <a href="{{route('entity',['id'=> $entity->_id])}}">View</a>
        </div>
          <div class="col-2"></div>
          <div class="col-3 search-tags">
                  <h2>TAGS</h2>
                  <a href="" name="tags">Tags here</a>
                  <div class="similar">
                  <h3>Similar searches</h3>
                  <ul>
                  <li><a href="">Search Name here.</a></li>
                  <li><a href="">Search Name here.</a></li>
                </ul>
                </div>
          </div>
  </div>
  @endforeach

  <div class="row footer" name="src-foot">
      <div class="col-10 footer" >
          <p>Designed by: <a href="">&nbsp;Aniruddha</a>&nbsp;and<a href="">&nbsp;Dixon</a></p>
      </div>
      <div class="col-2 footer">
          <a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a>
      </div>
  </div>
</body>
</html>
