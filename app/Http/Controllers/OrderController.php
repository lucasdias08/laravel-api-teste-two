<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $response = Order::all();
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
            $result = Order::create($request->all());
            if(isset($result)){
                return $result;
            }
        } catch(Exception $e){
            return response()->json(['error' => 'Erro ao salvar pedido'], 400);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {
        try {
            $response = Order::where('id', $id)->get();

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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, $id)
    {
        try{
            $process = Order::where("id_order", $id)->update($request->all());
            if(isset($process)){
                $response = Order::where('id_order', $id)->get();
                return $response;
            }
            
        }catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, $id)
    {
        try{
            Order::where("id_order", $id)->delete();
            
            return response()->json(['msg' => 'Pedido deletado com sucesso'], 200);
        }catch(Exception $e){
            return response()->json(['error' => 'natureza do erro desconhecida'], 400);
        }
    }
}
