@extends('admin.navbar')

@section('content')
<div class="container-fluid bg-primary p-5 text-white ">
    <h2>Selamat datang {{Auth::user()->name }} !</h2>
    <p>Jangan lupa membaca basmalah sebelum bekerja !</p>
</div>
@endsection