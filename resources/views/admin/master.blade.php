  @extends('layouts.app')
  @section('title','admin')
  @section('content')
  @include('includes.navbar')
  @include('includes.userModule')

  <ul>
      <li><a href="#tabs-1">Insert</a></li>
      <li><a href="#tabs-2">Update and Delete</a></li>
  </ul>
  <div id="tabs-1">
        @include('layouts.entityEntry')
  </div>
  <div id="tabs-2">
  </div>

</div>
@include('includes.footer')
@endsection
@section('script')
<script src="/js/alterbit.js" type="text/javascript"></script>
<script src="/js/entityEntry.js" type="text/javascript"></script>
@endsection
