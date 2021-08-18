@extends('layout.theme')
@section('content')

<section class="bg-100 py-7">

    <div class="container-lg">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 text-center mb-3">
          <h2>Aanbod per locatie</h2>
          <p>Hier kan u een overzicht vinden van onze fysieke locaties en het bijhorende aanbod. Vragen? Wij helpen u steeds verder met de glimlach :)</p>
        </div>
      </div>
      <div class="row h-100 justify-content-center">
        @foreach ($data as $row)
        <div class="col-md-4 pt-4 px-md-2 px-lg-3">
        
          <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-around mx-auto">
              <div class="text-center pt-5">
                  {{-- <img class="img-fluid" src="assets/img/icons/pricing.png" alt="" /> --}}
                <h5 class="my-4">{{$row->name}} ({{$row->course_count}})</h5>
              </div>
              <ul class="list-unstyled">
               
               @foreach($row->course as $course)
                <li class="mb-3"><span class="me-2">
                    <svg class="bi bi-check" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2FAB73" viewBox="0 0 16 16">
                      <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                    </svg></span>{{$course->name}} - (€{{$course->price}})
                </li>
                @endforeach

              </ul>
              <div class="text-center my-5">
                <h2 class="mb-3">Inschrijven
                </h2>
                <a href="/signup" class="btn btn-outline-danger rounded-pill" type="submit">Sign Up </a>
              </div>
            </div>
          </div>
        
        </div>
        @endforeach
      </div>
    </div>
    <!-- end of .container-->

  </section>





@endsection