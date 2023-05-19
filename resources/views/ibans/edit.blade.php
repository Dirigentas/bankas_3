@extends('layouts.app')

@section('title', 'Lėšų redagavimas')

@section('content')
<div class="container col-md-7 mt-5 pt-5">
    <div class="card">
        <h2 class="card-header">Pridėti lėšas</h2>
        <div class="card-body">
            <form action="{{route('ibans-update', $iban)}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Sąskaitos likutis: {{$amount}} Eur</label>
                    <input type="text" class="form-control" name="amount" @if(Session::has('bad') || Session::has('bidis')) value="{{old('amount')}}" @else value='0.00' @endif>

                    <div class="mt-3">
                        <input class="ms-1 form-check-input" type="checkbox" value="1" id="flexCheckDefault" name='type' @if(($errors && old('type'))) checked @endif>
                        <label class="ms-4 form-check-label" for="flexCheckDefault">
                            Lėšų nuėmimas
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mt-4">Išsaugoti</button>
                    @csrf
                    @method('put')
            </form>
        </div>
    </div>
</div>

@endsection
