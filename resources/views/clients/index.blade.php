@extends('layouts.app')

@section('index', 'active')

@section('title', 'Klientų sąrašas')

@section('content')

<div class='container  pt-3'>
    <div class="card bg-light">
        <div class="card-header">
            <div class='row'>
                <h3 class='col-2'>Visi klientai</h3>
                <form class='col-3' action="{{route('clients-index')}}" method='get'>
                    <label for="search" class="form-label">Kliento paieška pagal pavardę:</label>
                    <input type="text" id="search" name='s' class="form-control" value="{{$s}}">
                    <button type="submit" class="mt-2 btn btn-outline-success">Ieškoti</button>
                    <a href='{{route('clients-index')}}' class='mt-2 ms-2 btn btn-outline-warning'>Išvalyti</a>
                </form>

                <form class='col-6 row' action="{{route('clients-index')}}" method='get'>
                    <div class="col-2">
                        <label for="per_page" class="form-label">Puslapiavimas</label>
                        <select id="per_page" name='per_page' class="form-select">
                            @foreach($perPageSelect as $value)
                            <option value="{{$value}}" @if($perPageShow==$value) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label">Rūšiavimas</label>
                            <select class="form-select" name="sort">
                                <option></option>
                                @foreach($sortSelect as $value => $name)
                                <option value="{{$value}}" @if($sortShow==$value) selected @endif>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label">Filtravimas</label>
                            <select class="form-select" name="iban_number">
                                <option value="all">visi</option>
                                @foreach($filterSelect as $value =>$filter)
                                <option value="{{$value}}" @if($filterShow==$value) selected @endif>{{$filter}}</option>
                    @endforeach
                    </select>
            </div>
        </div> --}}


        <div class='row'>
            <button type="submit" class="col-2 ms-4 mt-2 btn btn-outline-success">Rodyti</button>
        </div>
        </form>

    </div>
</div>
</div>
</div>

<div class="container text-center">
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
    @if($perPageShow != 'visi')
    <div class="m-2">{{ $clients->links() }}</div>
    @endif

</div>

@endsection
