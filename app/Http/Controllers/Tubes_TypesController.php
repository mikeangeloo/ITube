<?php

namespace App\Http\Controllers;

use App\tubes_types;
use Illuminate\Http\Request;

class tubes_TypesController extends Controller
{
    public function select_all(Request $request){

        if($request->ajax()){
            $tipotubo = new Tubes_Types();
            $tipo=$tipotubo->allTubeTypes();


            // Send as HTML

            $html = '';

            //$html .= '<select id="tubes_types" name="tubes_types" class="form-control">';
            $html .= '<option> --- </option>';
            foreach ($tipo as $tube_type)
            {
                $html .= '<option value="'.$tube_type->id.'"> '.$tube_type->name.'</option>';
            }
            $html .= '</select>';

            return $html;

        }
    }
}
