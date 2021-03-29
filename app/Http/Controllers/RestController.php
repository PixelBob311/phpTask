<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models;
class RestController extends Controller
{
    public function getCertainRates($userId, $serviceId){
        if( (Models\User::find($userId)!==null) and (Models\Service::find($serviceId)!==null)){
            $servicesList = Models\Service::getServices($serviceId,$userId);
            if(!$servicesList->get()->isEmpty()){
                $ratesList = Models\Rate::getRates($servicesList->first()->tarif_id);
                $json = array(
                    'title' => $ratesList->sortBy('title')[0]['title'],
                    'link' => $ratesList[0]['link'],
                    'speed' => $ratesList[0]['speed'],
                    'tarifs' => $ratesList
                );
                return response()->json(['result' => 'ok', 'tarifs' => $json],200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
            }
            return response()->json(['result' => 'error'],404);
        }
        return response()->json(['result' => 'error'],404);
    }
    public function update(Request $req){
        $rate = Models\Rate::find($req->rate_id);
        if(is_null($rate)){
            return response()->json(['result' => 'error'],404);
        }
        $rate->update($req->all());
        return response($rate,200);
    }
}
