<?php

namespace App\Http\Controllers;

use App\CorenInscrito;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search');
    }

    public function search(Request $request){
        $professional = null;
        if(!empty($request->cpf)){
            $request->validate([
                'cpf' => 'required|cpf',
            ]);
            $cpf = preg_replace("/\D+/", "", $request->input('cpf')); // remove qualquer caracter não numérico
            $professional = CorenInscrito::where([['cpf', $cpf], ['inscricao', 'LIKE', '%-ENF']])->get();
            if($professional->isEmpty()){
                $notification = "Este evento é restrito apenas para enfermeiros!";
                return view('search', compact('notification'));
            }
        }
        return view('search', compact('professional'));
    }

    public function autocomplete(Request $request){
        $data = CorenInscrito::select('nome')
        ->where("nome", "LIKE", "%{$request->input('query')}%")
        ->get();

        return response()->json($data);
    }
}
