@extends('layouts.app')

@section('home', 'active')

@section('title', 'Pagrindinis puslapis')

@section('content')
<p style="background-image: url('http://localhost/bankas_3/public/background.jpg'); width: 100%; height: calc(100vh - 72px); background-position: center; background-repeat:no-repeat; background-size:cover; background-attachment:fixed; text-align: center; font-size: 80px; color: green; line-height: 200px">
    Sveiki prisijungę
</p>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@endsection
