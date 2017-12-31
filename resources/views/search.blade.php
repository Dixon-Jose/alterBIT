<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>alterBIT|Search</title>
</head>
<body>
    <h1><a href={{route('home')}}>alterBIT</a> | The Unconventional way of life</h1>
    {{$entities}}
    @foreach($entities as $entity)
    <h3>{{$entity->name}}</h3>
    <a href="{{route('entity',['id'=> $entity->_id])}}">view</a>
    @endforeach
</body>
</html>