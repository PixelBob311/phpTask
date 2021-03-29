<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    protected $table = "users";
    protected $fillable = ['ID','login','name_last','name_first'];
    public $timestamps = false;
}
