@extends('layout.theme')
@section('content')

<div class="row">
<div class="col-md-8">
    @foreach ($courses as $course)
<div class="coursemain">
    <h3>{{$course->name}}</h3>
    
    <span class="badge badge-success">{{$course->category->name}}</span>
    <span class="badge badge-warning">{{$course->location->name}}</span>
    <span class="badge badge-default">{{Carbon\Carbon::parse($course->startdate)->format('d/m/Y')}}</span>
    
    @php 
    $rdays = Carbon\Carbon::now()->diffInDays($course->startdate);
    $create = Carbon\Carbon::parse($course->created_at);
    $update = Carbon\Carbon::parse($course->updated_at);
    $lasteupdate = $update->diffInDays($create);
    if (Carbon\Carbon::now()->diffInHours($course->updated_at) < 24) {
        echo "NEW UPDATE";
    }
    @endphp

    <span class="badge badge-light">Start in <b>{{$rdays}}d</b> - {{$lasteupdate}}</span>
    

    <a class="linkcourse" href="/course/{{$course->id}}">{!! $course->description !!}</a>
    <hr>
</div>
@endforeach
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="exampleInputEmail1">Zoek door ons aanbod</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sleutelwoorden aub">
        <small id="emailHelp" class="form-text text-muted">Niet gevonden wat u zoekt, maak dan gebruik van onze handige zoekfunctie...</small>
    </div>
    <button type="submit" class="btn btn-dark">Zoeken</button>
</div>
</div>





@endsection