<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@php
$name = "mgmg";
$arr = ["apple","orange","banana","mango"];
@endphp
<h1>I am {{ $name }}</h1>
<p>@json($arr)</p>

@if($name == "Kyawzinlatt")
    <p>You are Kyawzinlatt</p>
@elseif($name == "mgmg")
    <p>you are mgmg</p>
@else
    <p>Who are you?</p>
@endif

@for($i=1;$i<=10;$i++)
    {{ $i }} Hello
@endfor
<ul>
    @foreach($arr as $key=>$r)
        <li>{{ $key+1 }} {{ $r }}</li>
    @endforeach
</ul>
<img src="{{ asset('download.png') }}" alt="">
</body>
</html>
