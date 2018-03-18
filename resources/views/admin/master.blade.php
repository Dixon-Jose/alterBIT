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
  <br>
  <hr>
</div>
</div>
<!-- <div class="row"> -->
  <div id="tabs-1">
        @include('layouts.entityEntry')
      </div>
  </div>

  <div id="tabs-2" style="display:none" ></div>

</div>
<!-- </div> -->
@include('includes.footer')
@endsection
@section('script')
<script src="/js/admin.js" type="text/javascript"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/entityEntry.js" type="text/javascript"></script>
<script src="/js/pace.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
        $('body').on('click', '.submit', function () {
        $.ajax({
            method:"POST",
            url: "/entityinput",
            data: payload,
            headers:{
                "X-CSRF-TOKEN": $('input[type=hidden]').val()
            },
            success:function(message){
                    if(message=="success")
                    {alert("Database Updated");
                    window.location="/admin";}
                    else
                    alert(message);
                },
            error:function(jqXHR,status,error){
                    alert(status+":"+error);
                }
        });
    });
});
</script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="/css/loaders.css">
@endsection
