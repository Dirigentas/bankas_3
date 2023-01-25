@extends('layouts.app')

@section('create', 'active')

@section('title', 'Sukurti klientą')

@section('content')

<div class="container col-md-7 ">
    <div class="card">
        <h2 class="card-header">Sukurti klientą</h2>
        <div class="card-body">
            <form action="{{route('clients-store')}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Vardas</label>
                    <input type="text" name='name' class="form-control" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pavardė</label>
                    <input type="text" name='surname' class="form-control" value="{{old('surname')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Asmens kodas</label>
                    <input type="code" name='personalId' class="form-control" value="{{old('personalId')}}">
                </div>
                <button type="submit" class="btn btn-outline-primary mt-4">Sukurti</button>
                @csrf
            </form>
        </div>
    </div>
</div>

@endsection
