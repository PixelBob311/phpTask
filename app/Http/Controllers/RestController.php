<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models;
class RestController extends Controller
{
    public function getUsers(){
        return response()->json(Models\User::get(),200);
    }
    public function getUser($userId){
        return response()->json(Models\User::find($userId),200);
    }
    public function getCertainRates($userId, $serviceId){
        if( (Models\User::find($userId)!==null) and (Models\Service::find($serviceId)!==null)){
            $servicesList = Models\Service::getServices($serviceId,$userId);
            if(!$servicesList->get()->isEmpty()){
                $t2 = Models\Rate::getRates($servicesList->first()->tarif_id);
                $json = array(
                    'title' => $t2->sortBy('title')[0]['title'],
                    'link' => $t2[0]['link'],
                    'speed' => $t2[0]['speed'],
                    'tarifs' => $t2
                );
                return response()->json(['result' => 'ok', 'tarifs' => $json],200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
            }
        }
        return response()->json(['result' => 'error'],404);
    }
    public function update(Request $req){
        $t = Models\Rate::find($req->rate_id);
        $t->update($req->all());
        return response($t,200);
    }
}
