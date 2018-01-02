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
    <!-- {{$entities}} -->
    @foreach($entities as $entity)
    <div class="row src-page" >
        <div class="col-3"></div>
        <div class="col-6 card" title="src">
              <h3>{{$entity->name}}</h3>
              <a href="{{route('entity',['id'=> $entity->_id])}}">view</a>
        </div>
          <div class="col-3">
          </div>
  </div>
  @endforeach
</body>
</html>
