@extends('layouts.app')

@section('edit', 'active')

@section('title', 'Kliento redagavimas')

@section('content')
<div class="container col-md-7 mt-5 pt-5">
    <div class="card">
        <h2 class="card-header">Kliento redagavimas</h2>
        <div class="card-body">
            {{-- {{var_dump($errors)}}
            {{dump(old('surname') == true)}} --}}
            <form action="{{route('clients-update', $client)}}" method="post">
                <div class="mb-3">
                    <label class="form-label">Vardas</label>
                    <input type="text" class="form-control" name="name" @if(old('name')) value="{{old('name')}}" @else value="{{$client->name}}" @endif>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pavardė</label>
                    <input type="text" class="form-control" name="surname" @if(old('surname')) value="{{old('surname')}}" @else value="{{$client->surname}}" @endif>
                </div>
                <div class="mb-3">
                    <label class="form-label">Asmens kodas</label>
                    <input type="text" class="form-control" name="personalId" control name="personalId" @if(old('personalId')) value="{{old('personalId')}}" @else value="{{$client->personalId}}" @endif>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-4">Išsaugoti</button>
                @csrf
                @method('put')
            </form>
        </div>
    </div>
</div>

@endsection
