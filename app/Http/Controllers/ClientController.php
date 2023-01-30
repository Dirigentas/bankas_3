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
    public function index(Request $request)
    {
        $perPageShow = in_array($request->per_page, Client::PER_PAGE) ? $request->per_page : 'visi';

        $clients = Client::where('id', '>', 0); //tik uzklausos formavimas

        // $clients = $clients->orderBy('surname')->orderBy('name'); //tik uzklausos formavimas

        $clients = match($request->sort ?? '') {
            'asc_name' => $clients->orderBy('name'),
            'desc_name' => $clients->orderBy('name', 'desc'),
            'asc_surname' => $clients->orderBy('surname'),
            'desc_surname' => $clients->orderBy('surname', 'desc'),
            default => $clients
        }; //tik uzklausos formavimas

        if (!$request->s) {

            if ($perPageShow == 'visi') {
                $clients = $clients->get(); //duomenu gavimas
            } else {
                $clients = $clients->paginate($perPageShow)->withQueryString(); //duomenu gavimas
            }
        }
        else {
            $s = explode(' ', $request->s);
            
            //vieno zodzio paieska
            if(count($s) == 1) {
                $clients = Client::where('surname', 'like', '%'.$s[0].'%')->get();
            }
            //dvieju zodziu paieska
            else {
                $clients = Client::where('surname', 'like', '%'.$s[0].'%'.$s[1])
                ->orWhere('surname', 'like', '%'.$s[1].'%'.$s[0])->get();
            }

        }

        
        $ibans = Iban::all();

        return view('clients.index', [
            'clients' => $clients,
            'sortSelect' => Client::SORT,
            'sortShow' => isset(Client::SORT[$request->sort]) ? $request->sort : '',
            'ibans' => $ibans,
            's' => $request->s ?? '',
            'perPageSelect' => Client::PER_PAGE,
            'perPageShow' => $perPageShow,
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
            'name' => 'required|alpha|min:4|max:10',
            'surname' => 'required|alpha|min:4|max:10',
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
            'name' => 'required|alpha|min:4|max:10',
            'surname' => 'required|alpha|min:4|max:10',
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
