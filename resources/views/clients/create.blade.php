@extends('layouts.app')

@section('title', 'Sukurti klientą')

@section('content')

<div class="container row justify-content-center" style="margin-top: 100px;">
    <form action="{{route('clients-store')}}" method="post" class="m-4 col-12 col-sm-8 col-md-6">

        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input required type="text" name='name' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė</label>
            <input required type="text" name='surname' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Asmens kodas</label>
            <input required type="code" name='personalId' class="form-control">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="pep" name="pep">
            <label class="form-check-label" for="pep">
                Politikoje dalyvaujantis asmuo
            </label>
        </div>
        <button type="submit" class="btn btn-success">Sukurti</button>
        @csrf
    </form>
</div>

@endsection
