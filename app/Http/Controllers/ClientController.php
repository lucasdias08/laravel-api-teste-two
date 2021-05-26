<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $response = Client::all();
            return $response;
        } catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $response = Http::get("https://brasilapi.com.br/api/cep/v2/" .$request->input('cep'));

            if(isset($response) and isset($response['cep'])){
                $result = Client::create((array('name_client' => $request->input('name_client'),
                     'email' => $request->input('email'),
                        'phone_client' => $request->input('phone_client'),
                            'password' => bcrypt($request->input('password')),
                                'state_client' => $response['state'],
                                    'city_client' => $response['city'],
                                        'street_client' => $response['street'],
                                            'neighborhood_client' => $response['neighborhood']
                                                )));

                return $result;
            } else {
                return response()->json(['error' => 'Cep inválido'], 400);
            }
            
        } catch(Exception $e){
            return response()->json(['error' => 'Não foi possível salvar dados do cliente'], 400);
        }

        
        //return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, $id)
    {
        try {
            $response = Client::where('id', $id)->get();

            if(!empty($response)){
                return $response;
            }
            
        } catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, $id)
    {
        try{
            $process = Client::where('id', $id)->update(['name_client' => $request->input('name_client'),
                     'email' => $request->input('email'),
                        'phone_client' => $request->input('phone_client'),
                            'password' => bcrypt($request->input('password')),
                                'state_client' => $request->input('state_client'),
                                    'city_client' => $request->input('city_client'),
                                        'street_client' => $request->input('street_client'),
                                            'neighborhood_client' => $request->input('neighborhood_client')
                                            ]);
            if(isset($process)){
                $response = Client::where('id', $id)->get();
                return $response;
            }
            
        }catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, $id)
    {
        try{
            Client::where("id", $id)->delete();
            
            return response()->json(['msg' => 'Cliente deletado com sucesso'], 200);
        }catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
    }
}
