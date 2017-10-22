<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tubes extends Model
{
    public function selectWhere($id){
        $_tubes = DB::table('tubes')
            ->select('id', 'description')
            ->where('tubes_types_id','=', $id)
            ->get();
        return $_tubes;
    }
}
