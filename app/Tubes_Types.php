<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tubes_Types extends Model
{
    public function allTubeTypes(){
        $tubes_types = DB::table('tubes_types')->select('id', 'name')->get();
        return $tubes_types;
    }
}
