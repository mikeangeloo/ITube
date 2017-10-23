<?php

namespace ITube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cable_Types extends Model
{
    public function allCableTypes(){
        $cable_types = DB::table('cables_types')->select('id', 'name')->get();
        return $cable_types;
    }
}
