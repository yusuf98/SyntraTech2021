@extends('layout.theme')
@section('content')

<div class="col md-8">
<h2>Welkom, Maak een cursist account aan...</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/signup">
  @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Uw volledige naam</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
      </div>
    <div class="form-group mt-3">
      <label for="exampleInputEmail1">Uw email</label>
      <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group mt-3">
      <label for="exampleInputEmail1">Geboortedatum</label>
      <input type="date" class="form-control" name="bdate" value="{{ old('bdate') }}">
    </div>
    <div class="form-group mt-3">
      <label for="exampleInputEmail1">Telefoon</label>
      <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
    </div>

    <div class="form-group mt-3">
      <label for="exampleFormControlSelect1">Kies uw cursus</label>
      <select class="form-control" name="course">
        @foreach ($courses as $course)
        <option value="{{$course->id}}">{{$course->name}} - €{{$course->price}}</option>
        @endforeach
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
  </form>
</div>

<div class="col md-4"></div>

@endsection