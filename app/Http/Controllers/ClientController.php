<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Iban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
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
        $clients = Client::all()->sortBy('surname');
        $ibans = Iban::all();

        return view('clients.index', [
            'clients' => $clients,
            'ibans' => $ibans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:4|max:100',
            'surname' => 'required|alpha|min:4|max:100',
            'personalId' => 'required|numeric|min_digits:11|max_digits:11|unique:clients,personalId',
            ],
        [
            'name' => 'Netinkamas vardo formatas',
            'surname' => 'Netinkamas pavardės formatas',
            'personalId.unique' => 'Toks klientas jau egzistuoja',
            'personalId' => 'Netinkamas asmens kodo formatas',
        ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }


        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->personalId = $request->personalId;
        $client->pep = $request->pep == 'on'? 1 : 0;
        $client->save();

        return redirect()->route('clients-create')->with('ok', 'Klientas sukurtas sėkmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
            $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:4|max:100',
            'surname' => 'required|alpha|min:4|max:100',
            'personalId' => 'required|numeric|min_digits:11|max_digits:11',
            ],
        [
            'name' => 'Netinkamas vardo formatas',
            'surname' => 'Netinkamas pavardės formatas',
            'personalId' => 'Netinkamas asmens kodo formatas',
        ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->personalId = $request->personalId;
        $client->pep = $request->pep == 'on'? 1 : 0;
        $client->save();

        return redirect()->route('clients-index')->with('update', 'Klientas paredaguotas sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if (!$client->clientIbans()->count()) {
            $client->delete();
            return redirect()->route('clients-index')->with('okis', 'Klientas ištrintas sėkmingai');
        }
        return redirect()->route('clients-index')->with('nokis', 'Klientas turi sąskaitų');
    }
}
