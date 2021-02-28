@extends('layouts.default', ['title' => 'Annulation'])

@section('content')
<div class="container mt-6 mx-auto w-1/2 p-6 text-center shadow rounded bg-white">
  <div class="text-2xl mb-4 font-bold">
    Pour annuler définitivement votre réservation, cliquez sur le bouton ci-dessous. Toute annulation est définitive.
  </div>
  <form action="{{route('cancel.confirm', ['token' => $token] )}}" method="POST">
    @csrf
    <div class="py-3 text-center sm:px-6">
      <button type="submit" class="inline-flex text-2xl justify-center w-1/2 py-2 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
       <a href="{{route('cancel.confirm', ['token' => $token] )}}">Annuler</a>
      </button>
    </div>
  </form>
</div>
@endsection('content')