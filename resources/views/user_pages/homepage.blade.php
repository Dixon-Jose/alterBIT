<!DOCTYPE html>
<head>
  <title>alterBIT | The unconventional way of life</title>
  @extends('user_pages.fonts')
  <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
  <script src="{{URL::to('js/less.js')}}" type="text/javascript">
  </script>
</head>

<body>

<div class="menu-bar">
<div class="menu-title">
  <a href="{{URL::to('/')}}">alterBiT |<span class="title-span">The Unconventional Way of Life</span></a>
</div>
</div>

<div class="element">
  <h2>Element Name</h2>
  <div class="ele-desc">
    <p>Eyyy Kaun hai? Lorem Ipsum</p>
  </div>
</div>
<div class="partition">
  <h2>The Unconventionals are:</h2>
</div>

<div class="alter">
  <h2>Alternates Here.</h2>
</div>

</body>
</html>
