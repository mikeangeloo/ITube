<?php

namespace ITube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use ITube\ProjectsContent;
use ITube\Projects;
use ITube\User;

class ProjectsController extends Controller
{
    public function index(){

    }

    public function store(Request $request){

        $proyectoconte = new ProjectsContent();
        $proyectoid = $this->storeProyect($request);

        $proyectoconte->projects_id =$proyectoid;
        $proyectoconte->tubes_types_id = $request->selected_material;
        $proyectoconte->cables_amount = $request->cables_amount;
        $proyectoconte->cables_types_id = $request->cables_type;
        $proyectoconte->cables_id = $request->cable_id;
        $proyectoconte->details = $request->respuestas;

        $proyectoconte->save();

        return Redirect::to('/');
    }

    public function storeProyect(Request $request){
        $proyecto = new Projects();
        if($request->usuario=="default"){
            $userid = User::where('name','=','default')->get();
            $proyecto->user_id = $userid[0]['id'];
            $proyecto->name_project = $request->nombreproyecto;
            $proyecto->general_description = $request->descripcionproyecto;
            $proyecto->share_link = url("/");

            $proyecto->save();

        }

        return $proyecto->id;
    }

    public function show(){
        echo "show";
    }

    public function calcularTrayectoria(){
        //print_r($_POST);

         $html = '<h3>Para este trayecto es recomendable utilizar:</h3>';

         $external_diameter = $_POST['cable_diameter'];
         $num_cables = $_POST['cables_amount'];
         $idSelectedMaterial = $_POST['selected_material'];
         $isForniture = 0;
        if(isset($_POST['interior'])){
            $isForniture = 1;
        }

         $areaCables = round(pi()*pow(($external_diameter/2),2),2);
         $totalareaCables = ($areaCables)*($num_cables);

        $querry = new Projects();
        $result = $querry->callSerachTubesProcedure($totalareaCables,$num_cables,$idSelectedMaterial,$isForniture);

        if(!empty($result)){
            foreach ($result as $_result) {
                $html .= '<textarea block name="respuestas" id="respuestas" value="afdasf">'.$_result->description.'" "'."\n\r".'Area ocupada: '.$totalareaCables.' mm^2'."\n" .'Total de cables:'.$num_cables."\n\r".'</textarea>';
            }
        }else{
            $html .='<textarea>Prueba con otras combinaciónes, no existe material soportado :(</textarea>';
        }


        return $html;

    }
}