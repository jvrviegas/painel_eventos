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
        if(!empty($request->inscricao)){
            $professional = CorenInscrito::where('inscricao', $request->inscricao)->get();
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
