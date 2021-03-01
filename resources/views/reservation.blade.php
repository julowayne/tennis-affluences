@extends('layouts.default', ['title' => 'Reservation'])

@section('content')
<div class="container mt-10 p-4 mx-auto w-2/4 p-6 text-center shadow rounded bg-white">
  <div class="text-3xl mb-6 font-bold">
    Je réserve mon terrain pour une heure.
  </div>
@if(Session::has('message'))
<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-yellow-500">
  <span class="inline-block align-middle">
  <ul>
    <li> {{ Session::get('message') }}</li>
  </ul>
  </span>
</div>
@endif
@if ($errors->any())
<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-yellow-500">
  <span class="inline-block align-middle">
  <ul>
  @foreach($errors->all() as $error)
    <li> {{ $error }}</li>
  @endforeach
  </ul>
  </span>
</div>
@endif
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-4">
      <div>
        <div class="flex justify-center">
          <img class="h-8 w-auto sm:h-10" src="/assets/img/alert.png">
        </div>
        <div>
          <ul class="p-3">
          <li class="text-left text-2xl mb-2">
            Attention il n'y a que 2 places/heure disponibles !
          </li>
          <li class="text-left text-2xl">
           Les reservations se font sur heure complète. <br> (exemple: 17h00)
          </li>
          </ul>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2 shadow-sm">
        <form action="{{route('reservation')}}" method="POST">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="p-4 bg-gray-200 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="date" class="block text-sm text-left font-medium text-gray-700">Date & heure</label>
                  <input type="datetime-local" step="3600" min="{{ Carbon\Carbon::now('Europe/Paris')->format('Y-m-d\TH:00') }}" max="2021-12-31T17:00" name="date" id="date" value="{{ old('date', Carbon\Carbon::now('Europe/Paris')->format('Y-m-d\TH:00'))}}" autocomplete="given-name" class=" p-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-8 sm:col-span-6">
                  <label for="email" class="block text-sm text-left font-medium text-gray-700">Adresse e-mail</label>
                  <input type="text" name="email" id="email" autocomplete="email" value="{{ old('email')}}" class="p-2 mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                </div>
                <div class="col-span-8 text-left sm:col-span-6">
                  <input class="form-check-input" type="checkbox"  id="cgu" name="cgu" required>
                  <label class="form-check-label" for="cgu">
                      J'ai lu et accepté les <a href="#">conditions d'utilisation</a>
                  </label>
                </div>
            </div>
            <div class="py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                Réserver
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection('content')
