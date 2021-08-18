@extends('layout.theme')
@section('content')

<h2>{{$course->name}}</h2>
<hr>
<h4>{{$course->description}}</h4>
<h3>Aantal cursisten <span class="badge bg-secondary">{{$course->student->count()}}</span></h3>
<div class="mt-3">{{$course->fulldescription}}</div>
@endsection