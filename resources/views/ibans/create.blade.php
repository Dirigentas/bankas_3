@extends('layouts.app')

@section('title', 'Sukurti klientą')

@section('content')

<div class="container row justify-content-center" style="margin-top: 100px;">
    <form action="{{route('clients-store')}}" method="post" class="m-4 col-12 col-sm-8 col-md-6">

        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input required type="text" name='vardas' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė</label>
            <input required type="text" name='pavarde' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Asmens kodas</label>
            <input required type="code" name='asmens kodas' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sąskaitos numeris</label>
            <input readonly value='<?=$randomIban?>' name='IBAN' class="form-control">
        </div>
        <input hidden value="0.00" name='likutis'>
        <button type="submit" class="btn btn-success">Pateikti</button>
        @csrf
    </form>
</div>

{{-- <h6 <?= $result == 'success' ? 'class="alert alert-success" role="alert">Sąskaita pridėta sėkmingai' : '' ?>></h6>
<h6 <?= $result == 'error' ? 'class="alert alert-danger" role="alert">Ir vardą, ir pavardę turi sudaryti bent 4 simboliai' : '' ?>></h6>
<h6 <?= $result == 'error2' ? 'class="alert alert-danger" role="alert">Klientas su tokiu asmens kodu jau egzistuoja' : '' ?>></h6>
<h6 <?= $result == 'error3' ? 'class="alert alert-danger" role="alert">Netinkamas asmens kodo formatas' : '' ?>></h6> --}}

@endsection
