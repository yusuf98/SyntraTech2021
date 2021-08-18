<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{public_path('assets/css/pdf.css')}}">
</head>
<body>
<img src='{{public_path('assets/img/icons/logo.png')}}' width='100px'>
<h1>Details student</h1>
<h4>Contactgevens en actieve opleidingen</h4>
<br>

<img src="{{public_path('storage/'.$student->profilepic)}}" width="150px">
{{-- Use the public path method to make sure that your assets are retrieved succesfully --}}
<br>
<b>Naam:</b> {{$student->name}}<hr>
<b>Email:</b> {{$student->email}}<hr>
<b>Telefoon:</b> {{$student->phone}}<hr>
<b>Leeftijd:</b> {{Carbon\Carbon::parse($student->bdate)->age}} ({{Carbon\Carbon::parse($student->bdate)->format('d/m/Y')}})<hr>
{{-- Carbon methods are possible in the view, dont forget to use the full path to the carbon lib Carbon\Carbon --}}
<h3>Opleidingen</h3>
<ul>
@foreach ($student->course as $course)
    <li>{{$course->name}}</li>
@endforeach
</ul>
<footer>
    <img src='{{public_path('assets/img/icons/logo.png')}}' width='20px'> SYNTRA<b>Tech</b><hr>
    <span style='color:#CCCCCC;font-size:10px'>SyntraTech, alle nuttige tech opleidingen in portfolio. Schrijf u in op onze nieuwsbrief om updates en nieuwtjes te ontvangen.
</footer>
</body>
</html>
