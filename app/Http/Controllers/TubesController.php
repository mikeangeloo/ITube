<?php

namespace App\Http\Controllers;

use App\Tubes;
use Illuminate\Http\Request;

class TubesController extends Controller
{
    public function selectTubes(Request $request,$id){

        if($request->ajax()) {
            $_tubes = new Tubes();
            $_tubesWhere = $_tubes->selectWhere($id);


            // Send as HTML

            $html = '';

            //$html .= '<select id="tubes_types" name="tubes_types" class="form-control">';
            $html .= '<option> --- </option>';
            foreach ($_tubesWhere as $_tubesid) {
                $html .= '<option value="' . $_tubesid->id . '"> ' . $_tubesid->description . '</option>';
            }
            $html .= '</select>';

            return $html;
        }

    }
}
