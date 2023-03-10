@extends('layouts.app')

@section('title', 'Pridėti sąskaitą')

@section('content')

<div class="container col-md-7 ">
    <div class="card">
        {{-- {{dump($client)}} --}}
        <h2 class="card-header">Pridėti naują sąskaitą, klientui: {{$client->surname}}</h2>
        <div class="card-body">
            <form action="{{route('ibans-store')}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Sąskaitos numeris</label>
                    <input readonly value='{{$randomIban}}' name='iban' class="form-control">
                    <input hidden value='{{$client->id}}' name='client_id' class="form-control">
                    <input hidden value='0.00' name='amount' class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary mt-4">Sukurti</button>
                @csrf
            </form>
        </div>
    </div>
</div>


@endsection
