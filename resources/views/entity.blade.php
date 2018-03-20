    @extends('layouts.app')
    @section('title',$entity->name)
    @section('content')
    @include('includes.navbar')


<div class="row">
        <div class="col-1"></div>
        <div class="col-10 src-page-bar">
                <form method="get" action="{{ route('search') }}">
                <input type="search" placeholder="Search" id="search" name="q">
                </form>
        </div>
</div>

<div class="row">
    <div class="col-2 element"></div>
    <div class="col-8 element">
            @if(isset($entity))
            <div class="card-img">
                <img src={{$entity->imgurl}}>
            </div>
            <h2>{{$entity->name}}</h2>
            <p title="entity">{{$entity->description}}</p>
            @endif
            <hr/>
    </div>
</div>

<div class="row">
    <div class="col-12 partition">
     @if(isset($alternatives))
          <h2>The Alternatives are:</h2>
     @else     
          <h2>No alternatives Found</h2>
    @endif
    </div>
</div>
        @if(isset($alternatives))
<div class="row">
    <div class="col-12 alter">
        <div class="col-2"></div>
        @foreach($alternatives as $alternative)
            <div class="col-2 card">
                <h3>{{$alternative['name']}}</h3>
                <p>  {{substr($alternative['description'],0,100)}}</p>
                <a href="{{route('entity',['category'=>$alternative['category'],'id'=> $alternative['id']])}}">Check out</a>
            </div>
            @endforeach
            <div class="clear"></div>
            @include('includes.footer')
       </div>
    </div>
    @else
    <br><br><br><br><br><br><br><br>
        @endif


        @endsection
