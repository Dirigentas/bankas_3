@extends('layouts.app')

@section('title', 'Lėšų redagavimas')

@section('content')
<div class="container col-md-7">
    <div class="card">
        <h2 class="card-header">Pridėti arba nuimti lėšas</h2>
        <div class="card-body">
            <form action="{{route('ibans-update', $iban)}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Sąskaitos likutis: {{$amount}} Eur</label>
                    <input type="text" class="form-control" name="amount" value='0.00'>
                    <button type="submit" class="btn btn-outline-primary mt-4">Išsaugoti</button>
                    @csrf
                    @method('put')
            </form>
        </div>
    </div>
</div>

@endsection
