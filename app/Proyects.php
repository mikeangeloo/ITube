<?php

namespace ITube;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyects extends Model
{
    public function callSerachTubesProcedure($area_cables, $num_cables, $idtype, $isForniture){
        $cable_types = DB::select('call search_tubes("'.$area_cables.'","'.$num_cables.'","'.$idtype.'","'.$isForniture.'")');
        return $cable_types;
    }
}
