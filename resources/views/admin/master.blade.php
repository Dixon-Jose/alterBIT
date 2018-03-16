  @extends('layouts.app')
  @section('title','admin')
  @section('content')
  @include('includes.navbar')
  @include('includes.userModule')
<div class="row home-links-admin">
<div class="col-2"></div>
<div class="col-8">
  <table>
    <tr>
      <th><a class="tab1" href="#tabs-1">Insert</a></th>
      <th><a class="tab2" href="#tabs-2">Suggestions</a></th>
    </tr>
  </table>
</div>
</div>
<!-- <div class="row"> -->
  <div id="tabs-1">
        @include('layouts.entityEntry')
      </div>
  </div>

  <div id="tabs-2" style="display:none" >
    <div class="row" >
        <div class="col-2"></div>
        <a href="">
            <div class="col-6 search-result">
                    <div class="src-img"><img src="http://d2bhqx49zlo9rr.cloudfront.net/wp-content/uploads/2016/03/26144435/Broadcast_MrRobot_M_002.jpg"></div>
                    <h2>Entity Name</h2>
                    <p>Hello hello hello, is there anybody in there?</p>
            </div>
        </a>
    </div>
  </div>

</div>
<!-- </div> -->
@include('includes.footer')
@endsection
@section('script')
<script src="/js/alterbit.js" type="text/javascript"></script>
<script src="/js/entityEntry.js" type="text/javascript"></script>
@endsection
