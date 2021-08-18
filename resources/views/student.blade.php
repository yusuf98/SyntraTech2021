@extends('layout.theme')
@section('content')
<h2 class="mb-6">Deze jongeren investeren in hun toekomst!</h2>
@foreach ($students as $student)
<div class="studenttease">
<img src="{{$student->profilepic}}" class="img-fluid profile student" alt="{{$student->name}}">

    @foreach ($student->course as $course)
    <a href="/course/{{$course->id}}" class="btn btn-outline-danger rounded-pill order-0 student">{{$course->name}}</a>
    @endforeach
</div>
@endforeach

@endsection

