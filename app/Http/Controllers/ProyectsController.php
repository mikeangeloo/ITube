<?php

namespace ITube\Http\Controllers;

use Illuminate\Http\Request;
use ITube\Proyects;

class ProyectsController extends Controller
{

    public function calcularTrayectoria(){
        //print_r($_POST);

         $html = '<h3>Para este trayecto es recomendable utilzar:</h3>';

         $external_diameter = $_POST['cable_diameter'];
         $num_cables = $_POST['cables_amount'];
         $idSelectedMaterial = $_POST['selected_material'];
         $isForniture = 0;
        if(isset($_POST['interior'])){
            $isForniture = 1;
        }

         $areaCables = round(pi()*pow(($external_diameter/2),2),2);
         $totalareaCables = ($areaCables)*($num_cables);

        $querry = new Proyects();
        $result = $querry->callSerachTubesProcedure($totalareaCables,$num_cables,$idSelectedMaterial,$isForniture);

        foreach ($result as $_result) {
            $html .= '<textarea disabled>'.$_result->description.'" "'."\n\r".'Area ocupada: '.$totalareaCables.'mm^2'."\n" .'Total de cables:'.$num_cables."\n\r".'</textarea>';
        }
        return $html;

    }
}
