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
<style>
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace-inactive {
  display: none;
}

.pace .pace-progress {
  background: #29d;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 2px;
}

</style>
@endsection
