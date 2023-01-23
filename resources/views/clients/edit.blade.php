@extends('layouts.app')

@section('title', 'Kliento redagavimas')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Kliento redagavimas</h1>

                </div>
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
    </div>
</div>
@endsection
