@extends('layouts.app')
@section('title','Search')
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
        <div class="col-1"></div>
        <div class="col-10 src-tags">
        @php
        $selected=[];
        if(!empty($selectedtags)){
            $selected=$selectedtags;
        }
        @endphp
              @foreach($tags as $tag)
              @if(in_array($tag,$selectedtags))
              <a href="{{route('search',['tag'=>$tag,'s'=>implode(",",$selected)])}}" style="color:red">{{$tag}}</a>
              @else
              <a href="{{route('search',['tag'=>$tag,'s'=>implode(",",$selected)])}}">{{$tag}}</a>
              @endif
              @endforeach
        </div>
  </div>
<br>
<div class="row">
  <div class="col-1"></div>
    <div class="col-6 src-head">
          <h3>Results</h3>
    </div>
</div>
@include('includes.search-card')
@include('includes.footer')
@endsection
