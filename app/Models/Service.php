<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['ID','user_id','tarif_id','payday'];
    public $timestamps = false;
    public static function getServices($serviceId,$userId){
        return Service::where([
            ['ID',$serviceId],
            ['user_id',$userId]
        ]);
    }
}
