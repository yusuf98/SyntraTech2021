@extends('layout.theme_home')

@section('numbers')
{{-- This section will be displayed on our template (yield) --}}
<section class="py-4">

    <div class="container">
      <div class="card py-5 border-0 shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <div class="border-end d-flex justify-content-md-center">
                <div class="mx-2 mx-md-0 me-md-5">
                  <div class="badge badge-circle bg-soft-danger">
                    <svg class="bi bi-person-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <p class="fw-bolder text-1000 mb-0">{{$countStudent}}+ </p>
                  <p class="mb-0">Students </p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="border-end d-flex justify-content-md-center">
                <div class="mx-2 mx-md-0 me-md-5">
                  <div class="badge badge-circle bg-soft-danger">
                    <svg class="bi bi-geo-alt-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <p class="fw-bolder text-1000 mb-0">{{$countTeacher}}+ </p>
                  <p class="mb-0">Teachers </p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-md-center">
                <div class="mx-2 mx-md-0 me-md-5">
                  <div class="badge badge-circle bg-soft-danger">
                    <svg class="bi bi-hdd-stack-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                      <path d="M2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <p class="fw-bolder text-1000 mb-0">{{$countLocation}}+ </p>
                  <p class="mb-0">Locations </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of .container-->

  </section>

@endsection


@section('intro')

<section class="pb-6">

  <div class="container">
    <div class="row flex-center">
      <div class="col-lg-6 col-md-5 order-md-1"><img class="img-fluid" src="assets/img/illustrations/1.png" alt="" /></div>
      <div class="col-md-7 col-lg-6 mt-5 text-center text-md-start">
      @guest
        <div class="weather">
          
           {{number_format($weather['main']['temp'],0)}}° - @if ($weather['clouds']['all'] > 50) <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cloudy" viewBox="0 0 16 16">
           
            <path d="M13.405 8.527a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 14.5H13a3 3 0 0 0 .405-5.973zM8.5 5.5a4 4 0 0 1 3.976 3.555.5.5 0 0 0 .5.445H13a2 2 0 0 1-.001 4H3.5a2.5 2.5 0 1 1 .605-4.926.5.5 0 0 0 .596-.329A4.002 4.002 0 0 1 8.5 5.5z"/>
          </svg> @else <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
          </svg> @endif
          </div>
          @endguest

          @auth
          Dit ziet enkel de logged in user... in tegenstelling tot de guest; handig in blade! Pratisch gebruik bij logged in laat de logout knop zien, en bij logged out laat de login knop zien...
          @endauth
          
        <h1 class="fw-medium">Tech opleidingen<br />voor <span class="fw-bold">de techies.</span></h1>
        <p class="mt-3 mb-4">Verdien veel geld met minimale inspanning <span class="fw-medium">LaslesVPN </span>discover interesting features from us.Most people make the mistake of forcing themselves to network.Or they pretend to be outgoing to make new connections. </p><a class="btn btn-lg btn-danger hover-top btn-glow" href="/location">Ontdenk onze locaties</a>
      </div>
    </div>
  </div>
  <!-- end of .container-->

</section>

@endsection


@section('locations')

<section class="pt-4 pt-md-6">

    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5 col-lg-7 text-lg-center"><img class="img-fluid mb-5 mb-md-0" src="assets/img/illustrations/2.png" alt="" /></div>
        <div class="col-md-7 col-lg-5 text-center text-md-start">
          <h2>Schitterende <br />leegstaande locaties van</h2>
          <p> Onze locaties zijn hoogtechnolgisch en voorzien van alle gebruikscomfort, echter op dit moment zijn de kakkerlakken de enige inwoners</p>
          @foreach ($locations as $location)
          <div class="d-flex">
            <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
            <p class="ms-2">{{$location->name}} - ({{$location->zipcity}})</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- end of .container-->

  </section>

@endsection