<?php

namespace App\Http\Controllers;

use App\Mail\Agreement;
use App\Mail\NewSale;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SalesController extends Controller
{
    function index(Request $request){
        $sales = Sale::whereIn('status', config('status')[Auth::user()->profile])
                    ->orderBy('updated_at', 'asc')
                    ->with(['user'])
                    ->get();
        return response()->json($sales);
    }
    function store(Request $request){
        $sale = new Sale();
        $sale->user_id = Auth::user()->id;
        $sale->fill($request->all());
        $sale->agreement = uniqid() . '.pdf';
        $sale->save();

        if($request->sign) {
            $sign = uniqid() . '.jpg';
            file_put_contents(public_path('img/' . $sign), base64_decode($request->sign));
            $request->sign = $sign;
        }
        if($request->sign2) {
            $sign2 = uniqid() . '.jpg';
            file_put_contents(public_path('img/' . $sign2), base64_decode($request->sign2));
            $request->sign2 = $sign2;
        }
        if($request->sign3) {
            $sign3 = uniqid() . '.jpg';
            file_put_contents(public_path('img/' . $sign3), base64_decode($request->sign3));
            $request->sign3 = $sign3;
        }
        if($request->photos) {
            $photos = [];
            foreach($request->photos as $photo) {
                $filename = uniqid() . '.jpg';
                file_put_contents(public_path('img/' . $filename), base64_decode($photo));
                array_push($photos, $filename);
            }
            $sale->images = $photos;
            $sale->save();
        }

        $request->birthday = $sale->birthday ? $sale->birthday->format('m/d/Y') : '';
        $agreement = view('pdf.agreement')->with(['request' => $request])->render();
        PDF::loadHTML($agreement)->save(storage_path('app/agreements/' . $sale->agreement));
        Mail::to(env('MAIL_TO'))->send(new NewSale($sale));
        Mail::to($sale->email)->send(new Agreement(storage_path('app/agreements/' . $sale->agreement)));
        return response()->json($sale);
    }
    function downloadAgreement($id) {
        $sale = Sale::find($id);
        $path = storage_path('app/agreements/' . $sale->agreement);
        return response()->download($path);
    }
    function update(Request $request, $id){
        $sale = Sale::find($id);
        $sale->fill($request->all());
        $sale->save();
        return response()->json($sale);
    }
    function show($id){
        $sale = Sale::whereId($id)->with(['user'])->first();
        return response()->json($sale);
    }
    function destroy($id){
        $sale = Sale::find($id);
        $sale->delete();
        return response()->json('ok');
    }
}
