@extends('partials.layout')
@section('content')
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold">You are logged in!</h1>
        <a href="{{route('secure')}}" class="btn btn-primary mt-4">Secure page</a>
      </div>
    </div>
  </div>
@endsection
