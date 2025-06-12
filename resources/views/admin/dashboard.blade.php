@extends('layouts.admin-app')

@section('content')
    <h1 class="text-2xl font-bold">Halo Admin {{ Auth::user()->name }}</h1>
    <p>Selamat datang di halaman admin.</p>
@endsection
