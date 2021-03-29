<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID','title','price','link','speed','pay_period','tarif_group_id'];
    protected $timestamp = false;
    public static function getRates($rateId){
        return Rate::where('tarif_group_id',$rateId)->get();
    }
}
