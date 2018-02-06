<!DOCTYPE html>
<html lang="en">
<head>
  <title>alterBIT | Admin </title>
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
<div class="row ">
  <div class="col-2"></div>
  <div class="col-8 user-form">
        <div id="accord">
          <h3>Enter new alternative: </h3>
                  <!-- <hr> -->
                  <div>
                      <form method="post" action="{{ route('suggestionsInput') }}">
                         {{csrf_field()}}
                        <br>
                        <input type="text" id="name" name="name" placeholder="Name (of the alternative/entity)" required>
                        <br>
                        <textarea id="description" name="description" placeholder="Description" required></textarea>
                        <br>
                        <input type="text" id="alternative" placeholder="Alternative of (if any)">
                        <br>
                        <input type="text" id="tags" name="tags" placeholder="Tags">
                        <br>
                        <!-- <br> -->
                        <input type="button" id="add" value="Add more">
                        <br>
                        <input type="submit" id="submit" value="Submit">
                      </form>
                </div>
              <h3>Delete an alternative: </h3>
                      <div>
                          <form method="post" action="{{ route('suggestionsInput') }}">
                             {{csrf_field()}}
                            <br>
                            <input type="text" id="name" name="name" placeholder="Name (of the alternative/entity)" required>
                            <br>
                            <input type="submit" id="submit" value="Delete">
                          </form>
                    </div>
              <h3>Review a suggestion: </h3>
                      <div>
                          <form method="post" action="{{ route('suggestionsInput') }}">
                             {{csrf_field()}}
                            <br>
                            <input type="text" id="name" name="name" placeholder="Name (of the alternative/entity)" required>
                            <br>
                            <textarea id="description" name="description" placeholder="Description" required></textarea>
                            <br>
                            <input type="text" id="alternative" placeholder="Alternative of (if any)">
                            <br>
                            <input type="submit" id="submit" value="Submit">
                          </form>
                    </div>
            </div>
      </div>
<div class="col-2"></div>
</div>
 <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
</body>
</html>
