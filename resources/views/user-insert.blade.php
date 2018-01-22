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

    <!-- <div class="row">
        <div class="col-1"></div>
          <div class="col-10 src-page-bar">
                  <form method="get" action="{{ route('search') }}">
                  <input type="search" placeholder="Search" id="search" name="q">
                  </form>
          </div>
  </div> -->
  <div class="row ">
        <div class="col-2"></div>
        <div class="col-8 user-form">
                  <h3>Enter new alternative: </h3>
                  <hr>
                  <form>

                    <input type="text" id="name" placeholder="Name">
                    <br>
                    <textarea id="description" placeholder="Description"></textarea>
                    <br>
                    <input type="text" id="category" placeholder="Category">
                    &nbsp;
                    <input type="button" id="add" value="Add more">
                    <br>
                    <input type="submit" id="submit" value="Submit">

                  </form>
        </div>
        <div class="col-2"></div>
  </div>

  <script>
  // 
  // $("#add").click(function(){
  //       $("#submit").hide();
  //   });
  </script>

</body>
</html>
