<?php

namespace ITube\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use ITube\ProjectsContent;
use ITube\Projects;
use ITube\User;

class ProjectsController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $status = "Create";
        $proyectoconte = new ProjectsContent();
        $proyectoid = $this->storeProyect($request);

        $proyectoconte->projects_id =$proyectoid;
        $proyectoconte->tubes_types_id = $request->selected_material;
        $proyectoconte->cables_amount = $request->cables_amount;
        $proyectoconte->cables_types_id = $request->cables_type;
        $proyectoconte->cables_id = $request->cable_id;
        $proyectoconte->details = $request->respuestas;

        if ($proyectoconte->save()) {
            session()->flash('status', 'Project '.$status.'d successfully');
            return Redirect::to('/');
        }else{
            session()->flash('status', 'Unable to '.$status.' project try again');
            return back()->withInput();
        }


    }

    public function storeProyect(Request $request){


        $proyecto = new Projects();
        if($request->usuario=="default"){
            $userid = User::where('name','=','Default')->get();
            $proyecto->user_id = $userid[0]['id'];
            $proyecto->name_project = $request->nombreproyecto;
            $proyecto->general_description = $request->descripcionproyecto;
            $newHash = Str::random(10);
            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);
            $proyecto->save();
        }else{
            $userid = User::where('id','=',$request->usuario)->get();
            $proyecto->user_id = $userid[0]['id'];
            $proyecto->name_project = $request->nombreproyecto;
            $proyecto->general_description = $request->descripcionproyecto;
            $newHash = Str::random(10);
            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);
            $proyecto->save();
        }

        return $proyecto->id;
    }


    public function show($link){

        $result = Projects::where('share_link','=',url("projects/".$link))->get();

        echo "<pre>";
        print_r($result);
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
