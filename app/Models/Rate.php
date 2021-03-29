<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Rate extends Model
{
    protected $table = 'rates';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID','title','price','link','speed','pay_period','tarif_group_id',"new_payday"];
    public $timestamps = false;
    public $hidden = ['tarif_group_id','created_at', 'updated_at'];
    public static function getRates($rateId){
        $res = Rate::where('tarif_group_id',$rateId)->get();
        foreach($res as $i){
            $i['new_payday'] = Carbon::today()->addMonths($i['pay_period']);
        }
        return $res;
    }
}
