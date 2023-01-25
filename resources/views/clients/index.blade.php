@extends('layouts.app')

@section('index', 'active')

@section('title', 'Klientų sąrašas')

@section('content')

@foreach ($clients as $client)
<div class="container text-center mt-4">
    <div class="card">
        <div class="card-header"><?= $client['name'] ?> <?= $client['surname'] ?> <span class="badge bg-secondary"><?= $client['pep'] ?></span></div>
        <div class="card-body row">
            <h5 class="card-title col"><?= $client['personalId'] ?></h5>
            <div class='col'>
                <a href="{{route('clients-edit', $client)}}" class="btn btn-primary">Redaguoti klientą</a>
            </div>
            <form class='col' action="{{route('clients-destroy', $client)}}" method="post">
                <button type="submit" class="btn btn-danger">Ištrinti klientą</button>
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
