  @extends('layouts.app')
  @section('title','Suggestions')

  @section('content')
   @include('includes.navbar')
    @if(isset($message))
   <div class="row">
          <div class="col-4"></div>
                  <div class="col-5 search-mess">
                    <p title="message">{{$message}}</p>
                  </div>
          <div class="col-3"></div>
  </div>
  @endif
          <!-- <h3>Enter new alternative: </h3> -->
  @include('layouts.entityEntry')
@endsection

@section('script')
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/entityEntry.js" type="text/javascript"></script>
<script src="/js/pace.min.js" type="text/javascript"></script>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/loaders.css">
@endsection
