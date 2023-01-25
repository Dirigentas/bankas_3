<?php

namespace App\Http\Controllers;

use App\Models\Iban;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IbanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client)
    {
        $randomIban = 'LT'. rand(10, 99) . ' 7044 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);
        $client = $client;

        return view('ibans.create', ['randomIban' => $randomIban, 'client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->client_id, $request->iban);
        $iban = new Iban;
        // $iban = Client::find($request->client_id);
        $iban->iban = $request->iban;
        $iban->client_id = $request->client_id;
        $iban->amount = $request->amount;
        $iban->save();

        return redirect()->route('clients-index')->with('upi', 'Kliento sąskaita sėkmingai pridėta');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iban  $iban
     * @return \Illuminate\Http\Response
     */
    public function show(Iban $iban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iban  $iban
     * @return \Illuminate\Http\Response
     */
    public function edit(Iban $iban)
    {
        $amount = $iban->amount;
        
        return view('ibans.edit', [
            'iban' => $iban,
            'amount' => $amount
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Iban  $iban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iban $iban)
    {
        if ($iban->amount + $request->amount < 0) {
            return redirect()->back()->with('bad', 'Kliento lėšų likutis negali likti neigiamas');
        }
        else {
            $iban->amount = $iban->amount + $request->amount;
            $iban->save();
    
            return redirect()->back()->with('lesos', 'Kliento lėšos sėkmingai paredaguotos');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iban  $iban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iban $iban)
    {
        

        if ($iban->amount != 0) {
            return redirect()->back()->with('not', 'Sąskaita nėra tuščia');
        }
        else {
            $iban->delete();
            return redirect()->route('clients-index')->with('oki', 'Sąskaita sėkmingai ištrinta');
        }

    }
}
