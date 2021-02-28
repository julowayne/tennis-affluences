@extends('layouts.default', ['title' => 'Tennis reservation'])

@section('content')
<style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 49.01358646354988, lng: 2.0230005996015623 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 13,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow">
@if(Session::has('notification'))
  <div class="text-white px-6 py-4 border-0 rounded shadow text-center relative mb-4 bg-yellow-500">
    <span class="inline-block align-middle">
      <ul>
        <li> {{ Session::get('notification') }}</li>
      </ul>
    </span>
  </div>
  @endif
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
      <span class="block">Envie de reserver un terrain ?</span>
      <span class="block text-yellow-500">Choississez votre créneau selon les disponibilités.</span>
      <span class="block">Ouvert tout les jours de 9h à 18h</span>
    </h2>
    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="/reservation" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
          Je choisis mon horaire
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container flex">
  <div class=" w-1/2 p-6 rounded">
    <div class="text-center text-3xl mb-2 font-medium">
      Localisation
    </div>
    <div id="map" class="shadow rounded"></div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key={{$_ENV['GOOGLE_APP_KEY']}}&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </div>
  <div class=" w-1/2 p-6 rounded">
    <div class="text-center text-3xl font-medium">
      Le club
    </div>
    <div>
      <img src="/assets/img/tennis-municipaux-3.jpg" alt="tennis club">
    </div>
</div>
</div>


@endsection('content')