<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Biodiversitas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getuserData($id=null){

        $value=DB::table('biodiversitas')->orderBy('id', 'asc')->get();
        return $value;

      }
}
