@foreach($entities as $entity)
<div class="row " >
    <div class="col-1"></div>
    <a href="{{route('entity',['category'=>$entity->category,'id'=> $entity->_id])}}">
        <div class="col-6 search-result">
                <div class="src-img"><img src="{{$entity->imgurl }}"></div>
                <h2>{{$entity->name}}</h2>
                <p>{{substr($entity->description,0,100)}}</p>
        </div>
    </a>
</div>
@endforeach
