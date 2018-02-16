<!DOCTYPE html>
<html lang="en">
<head>
  <title>alterBIT | Admin </title>
  @extends('includes.fonts')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet/less" type="text/css" href="/css/main.less">
      <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <div class="col-2 element"></div>
      <div class="col-8 element">
              @if(isset($entity))
              <div class="card-img">
                  <img src={{$entity->imgurl}}>
              </div>
              <form>
              <textarea>Eyy Kaun hai?</textarea>
              <textarea>Kaun hai ?<textarea>
              @endif
            </form>
              <hr/>
      </div>
  </div>

</body>
</html>
