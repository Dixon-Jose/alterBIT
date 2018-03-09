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
    <div class="col-10"></div>
    <div class="col-1">
        <div class="link">
          <li class="dropdown">
              <a title="link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                  <li >
                      <a  href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                  <li><a href="{{ route('register') }}">Register a new admin</a></li>
              </ul>
          </li>
        </div>
    </div>
</div>

<div class="row ">
  <div class="col-2"></div>
  <div class="col-8 user-form">
        <div id="accord">
          <h3>Enter new alternative: </h3>
                  <!-- <hr> -->
                  <div>
                      <form method="post" action="{{ route('entityInsert') }}">
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
              <h3>Delete an alternative: </h3>
                      <div>
                          <form method="post" action="{{ route('suggestionsInput') }}">
                             {{csrf_field()}}
                            <br>
                            <input type="text" id="name" class="admin-name" placeholder="Name (of the alternative/entity)" required>
                            <br>
                            <input type="submit" id="submit" value="Delete">
                          </form>
                    </div>

                    <h3>Update an alternative: </h3>
                            <div>
                                <form method="post" action="{{ route('suggestionsInput') }}">
                                   {{csrf_field()}}
                                  <br>
                                  <input type="text" id="name" class="admin-name" placeholder="Name (of the alternative/entity)" required>
                                  <br>
                                  <a href=""><input type="button" id="submit" value="Go"></a>
                                </form>
                          </div>

            </div>
      </div>
<div class="col-2"></div>
</div>

 <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
        <script src="/js/alterbit.js" type="text/javascript"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
</script>

</body>
</html>
