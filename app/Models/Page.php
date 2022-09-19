<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Page extends Model
{
    use HasFactory;

    public static function getuserData($id=null){

        $value=DB::table('customers')->orderBy('id', 'asc')->get();
        return $value;

      }

      public static function insertData($data){

        $value=DB::table('customers')->where('username', $data['username'])->get();
        if($value->count() == 0){
          $insertid = DB::table('customers')->insertGetId($data);
          return $insertid;
        }else{
          return 0;
        }

      }

      public static function updateData($id,$data){
         DB::table('customers')->where('id', $id)->update($data);
      }

      public static function deleteData($id=0){
         DB::table('customers')->where('id', '=', $id)->delete();
      }
}
