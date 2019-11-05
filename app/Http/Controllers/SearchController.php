<?php

namespace App\Http\Controllers;

use App\CorenInscrito;
use App\Event;
use App\EventSubscription;
use Carbon\Carbon;
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
            $cpf = preg_replace("/\D+/", "", $request->input('cpf')); // remove qualquer caractere não numérico
            $professional = CorenInscrito::where([['cpf', $cpf], ['inscricao', 'LIKE', '%-ENF']])->first();
            if(!$professional){
                return response()->json([
                    'success' => false,
                    'message' => 'Este evento é restrito para enfermeiros!'
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'professional' => $professional
        ]);
    }

    public function subscript(Request $request, $id){
        $event = Event::findOrFail($id);
        $professional = CorenInscrito::where('inscricao', '=', $request->input('inscricao'))->first();
        $subscription = $event->subscriptions()->where('professional_id', '=', $professional->id)->first();
        $vagas_preenchidas = $event->subscriptions()->count();
        $remaining_vacancies = $event->vacancies - $vagas_preenchidas;
        $now = date('Y-m-d');

        // Posteriormente adicionar a verificação da restrição do evento pra este método
        if($now >= $event->subscription_start && $now <= $event->subscription_end){
            if($subscription){
                return response()->json([
                    'success' => false,
                    'message' => 'Você já realizou sua inscrição!'
                ]);
            }
            else if($remaining_vacancies > 0){
                $event_subscription = new EventSubscription();
                $event_subscription->event_id = $event->id;
                $event_subscription->professional_id = $professional->id;
                $save = $event_subscription->save();
                if($save){
                    return response()->json([
                        'success' => true,
                        'message' => 'Inscrição realizada com sucesso!'
                    ]);
                }
                else{
                    return response()->json([
                        'success' => false,
                        'message' => 'Falha ao realizar sua inscrição, por favor tente novamente!'
                    ]);
                }
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Inscrições esgotadas!'
                ]);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Inscrições encerradas'
            ]);
        }
    }

    public function autocomplete(Request $request){
        $data = CorenInscrito::select('nome')
        ->where("nome", "LIKE", "%{$request->input('query')}%")
        ->get();

        return response()->json($data);
    }
}
