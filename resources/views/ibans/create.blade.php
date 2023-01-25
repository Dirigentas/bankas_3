@extends('layouts.app')

@section('title', 'Pridėti sąskaitą')

@section('content')

<div class="container col-md-7 ">
    <div class="card">
        <h2 class="card-header">Pridėti sąskaitą klientui {{$client}}</h2>
        <div class="card-body">
            <form action="{{route('ibans-store')}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Sąskaitos numeris</label>
                    <input readonly value='{{$randomIban}}' name='iban' class="form-control">
                    <input readonly value='{{$client}}' name='client_id' class="form-control">
                </div>

                <button type="submit" class="btn btn-outline-primary mt-4">Sukurti</button>
                @csrf
            </form>
        </div>
    </div>
</div>


@endsection
