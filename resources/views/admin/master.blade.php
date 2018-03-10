  @extends('layouts.app')
  @section('title','admin')
  @section('content')
  @include('includes.navbar')
  @include('includes.userModule')
 
        <div id="accord">
              <h3>Insert an Alternative</h3>  
                @include('layouts.entityEntry')
                
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
@endsection