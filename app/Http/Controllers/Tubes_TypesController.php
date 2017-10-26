<?php

namespace ITube\Http\Controllers;

use ITube\tubes_types;
use Illuminate\Http\Request;

class tubes_TypesController extends Controller
{
    public function select_allTubeTypes(Request $request){

        if($request->ajax()){
            $tipotubo = new Tubes_Types();
            $tipo=$tipotubo->allTubeTypes();


            // Send as HTML

            $html = '';

            //$html .= '<select id="tubes_types" name="tubes_types" class="form-control">';
            $html .= '<option> Escoge... </option>';
            foreach ($tipo as $tube_type)
            {
                $html .= '<option value="'.$tube_type->id.'" data-tubename="'.$tube_type->name.'"> '.$tube_type->name.'</option>';
            }

            return $html;

        }
    }
}
