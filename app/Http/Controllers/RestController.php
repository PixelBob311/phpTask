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
        //написать проверку, что оба параметра - целые числа
        $json;
        if( (Models\User::find($userId)!==null) and (Models\Service::find($serviceId)!==null)){
            $servicesList = Models\Service::getServices($serviceId,$userId);
            if(!$servicesList->get()->isEmpty()){
                $t2 = Models\Rate::getRates($servicesList->first()->tarif_id);
                // return response()->json(['result' => 'ok', 'tarifs' => $t2],200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
                $str = "aaa";
                return strlen($str);
            }
        }
        return response()->json(['result' => 'error'],404);
    }
    public function update(Request $req){
        $t = Models\Rate::find($req->rate_id);
        $t->update($req->all());
        return response($t,200);
        // $t->save();
        // return $t;
    }
}
