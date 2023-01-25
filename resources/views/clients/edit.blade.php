@extends('layouts.app')

@section('edit', 'active')

@section('title', 'Kliento redagavimas')

@section('content')
<div class="container col-md-7">
    <div class="card">
        <h2 class="card-header">Kliento redagavimas</h2>
        <div class="card-body">
            <form action="{{route('clients-update', $client)}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Vardas</label>
                    <input type="text" class="form-control" name="name" value="{{$client->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pavardė</label>
                    <input type="text" class="form-control" name="surname" value="{{$client->surname}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Asmens kodas</label>
                    <input type="text" class="form-control" name="personalId" value="{{$client->personalId}}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="pep" name="pep" @if($client->pep) checked @endif>
                    <label class="form-check-label pointer" for="pep">
                        Politikoje dalyvaujantis asmuo
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
