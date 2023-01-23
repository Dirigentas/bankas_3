@extends('layouts.app')

@section('title', 'Klientų sąrašas')

@section('content')

<div class="container-sm py-5 px-5" style="text-align:center">
    <div>
        <div style="display:flex; justify-content: space-between; flex-direction: column; gap: 10px; border: solid 3px skyblue">
            @foreach ($clients as $client)
            <h6 style="display:flex; justify-content: space-between; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px">
                <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $client['name'] ?></div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $client['surname'] ?></div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-3 col-xl-3"><?= $client['personalId'] ?></div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-3 col-xl-3"><?= $client['pep'] ?></div>
                <a class="btn btn-outline-success" href="{{route('clients-edit', $client)}}">Redaguoti klientą</a>



                <form action="{{route('clients-destroy', $client)}}" method="post">
                    <button type="submit" class="btn btn-danger">Ištrinti klientą</button>
                    @csrf
                    @method('delete')
                </form>
            </h6>
            @endforeach
        </div>
    </div>
</div>

@endsection

{{-- <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= number_format($client['likutis'], 2, ',', ' ') ?></div> --}}
{{-- <a class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1" href="">Pridėti sąskaitą</a>
<a class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1" href="">Ištrinti sąskaitą</a> --}}
