<!DOCTYPE html>
<html lang="en">
<head>
  <title>alterBIT | User Insertion</title>
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

    @if(isset($message))
   <div class="row">
          <div class="col-4"></div>
                  <div class="col-5 search-mess">
                    <p title="message">{{$message}}</p>
                  </div>
          <div class="col-3"></div>
  </div>
  @endif

  <div class="row ">
        <div class="col-2"></div>
        <div class="col-8 user-form">
                  <h3>Enter new alternative: </h3>
                  <hr>
                  <form method="post" action="{{ route('suggestionsInput') }}">

                     {{csrf_field()}}


                    <br>
                    <input type="text" id="name" name="name" placeholder="Name (of the alternative/entity)" required>
                    <br>
                    <textarea id="description" name="description" placeholder="Description" required></textarea>
                    <br>
                    <br>
                    <label id="cat-label">Select category:</label>
                    <select id="category-select">
                      <option>Category 1</option>
                      <option>Category 2</option>
                      <option>Category 3</option>
                    </select>
                    <br>
                    <input type="submit" id="submit" value="Next">
                  </form>
        </div>
        <div class="col-2"></div>
  </div>

  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <hr>
    </div>
    <div class="col-2"></div>
  </div>
 <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
</body>
</html>
