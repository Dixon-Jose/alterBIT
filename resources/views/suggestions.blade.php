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
              <a id="alterbit-home" href="{{URL::to('/')}}">alterBiT<span> | The Unconventional Way of Life</span></a>
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
                  <form method="post" action="{{ route('suggestionsInput') }}" enctype="multipart/form-data">

                     {{csrf_field()}}
                    <br>
                    <input type="text" class="name" placeholder="Name (of the alternative/entity)" name="name" title="Enter the name of the product" required>
                    <br>
                    <textarea id="description"  placeholder="Description" name="description" title="Enter the description of the product" required></textarea>
                    <br>
                    <br>
                    <label id="cat-label">Select category:</label><br><br>
                    <select id="category-select" name="category" title="Select the category it belongs to" required>
                    <option value=" " disabled selected style=""></option>
                    @foreach($categories as $category)
                      <option> {{$category->toArray()[0]}}</option>
                    @endforeach
                    </select>
          </div>
          <div class="col-2"></div>
        </div>
        <div class="row sugg-page-form"  id="alternatives" style="display:none">
          <div class="col-2 "></div>
          <div class="col-8">
                    <div >
                                  <h3>Select alternatives: </h3>

                              <div class="controlgroup">

                                <input type="search" id="search" placeholder="Search">

                                <select id="alternative-select" name="alt-select" required>
                                    <option>Select one</option>
                                    <option>Select with all the alternatives</option>
                              </select>

                            </div>

        <div class="row">
        <div class="col-1"></div>
        <div class="col-10 src-tags">
        </div>
    </div>

                          <div class=" alter">
                          </div>
                          <input type="button" value="Done">
                    </div>
            </div>
            <div class="col-2"></div>
  </div>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
                <input type="file" id="img" name="image">
            <input type="submit" id="submit" value="submit">
          </form>
        </div>
      </div>

 <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="/js/alterbit.js" type="text/javascript">
</script>
<script>
var tooltips = $( "[title]" ).tooltip({
  position: {
    my: "left top",
    at: "right+10 top+1",
    collision: "none"
  }
});
</script>

</body>
</html>
