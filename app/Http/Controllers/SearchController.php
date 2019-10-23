<?php

namespace App\Http\Controllers;

use App\CorenInscrito;
use App\Event;
use App\EventSubscription;
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

    public function subscript($id){
        $event = Event::findOrFail($id);
        $professional = CorenInscrito::where('inscricao', '=', '382904-ENF')->first();
        $subscription = $event->subscriptions()->where('professional_id', '=', $professional->id)->first();
        $vagas = $event->subscriptions()->count();

        return view('test', compact('event', 'subscription', 'vagas'));
        /* $totalSubscriptions = EventSubscription::where('event_id', '=', $id)->all();
        if($event->vagas <= $totalSubscriptions){
            $subscription = new EventSubscription();
            $subscription->event_id = $request->input('event_id');
            $subscription->professional = $professional->id;
            $save = $subscription->save();
            if($save){
                return response()->json('Inscrição realizada com sucesso!');
            }
        }
        else{

        } */
    }

    public function autocomplete(Request $request){
        $data = CorenInscrito::select('nome')
        ->where("nome", "LIKE", "%{$request->input('query')}%")
        ->get();

        return response()->json($data);
    }
}
