<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
class SalesController extends Controller
{
    function index(Request $request){}
    function store(Request $request){
        $sale = new Sale();
        $sale->fill($request->all());
        $sale->save();
        return response()->json($sale);
    }
    function update(Request $request, $id){
        $sale = Sale::find($id);
        $sale->fill($request->all());
        $sale->save();
        return response()->json($sale);
    }
    function show($id){
        $sale = Sale::find($id);
        return response()->json($sale);
    }
    function destroy($id){
        $sale = Sale::find($id);
        $sale->delete();
        return response()->json('ok');
    }
}
