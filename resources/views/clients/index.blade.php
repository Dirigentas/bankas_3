@extends('layouts.app')

@section('index', 'active')

@section('title', 'Klientų sąrašas')

@section('content')

<div class="container text-center pt-5">
    @foreach ($clients as $client)
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">{{ $client['name']}}</div>
                <div class="col">{{ $client['surname']}}</div>
                <div class="col">{{ $client['personalId']}}</div>
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


        <div class="card body">
            <ul class="list-group-flush">
                <div class='row mt-2'>
                    @foreach ($ibans as $iban)
                    @if($iban['client_id'] == $client['id'])
                    <div class="list-group-item col-3">
                        <div>{{ $iban['iban']}}</div>

                        <div>{{ $iban['amount']}}</div>

                        <div class='row'>
                            <a href="{{route('ibans-edit', $iban)}}" class='ms-4 col-5 btn btn-outline-primary'>Redaguoti lėšas</a>
                            <form action="{{route('ibans-destroy', $iban)}}" class='col-6' method="post">
                                <button type="submit" class="btn btn-outline-danger">Ištrinti sąskaitą</button>
                                @csrf
                                @method('delete')
                            </form>

                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </ul>





            <div class='card-header'>
                <a href="{{route('ibans-create', $client)}}" class="ms-4 btn btn-outline-primary">Pridėti naują sąskaitą</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
