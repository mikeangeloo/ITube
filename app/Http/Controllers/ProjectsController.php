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

//    public function store(Request $request){
//        $status = "Create";
//        $proyectoconte = new ProjectsContent();
//        $proyectoid = $this->storeProyect($request);
//
//        $proyectoconte->projects_id =$proyectoid;
//        $proyectoconte->tubes_types_id = $request->selected_material;
//        $proyectoconte->cables_amount = $request->cables_amount;
//        $proyectoconte->cables_types_id = $request->cables_type;
//        $proyectoconte->cables_id = $request->cable_id;
//        $proyectoconte->details = $request->respuestas;
//
//        if ($proyectoconte->save()) {
//            session()->flash('status', 'Project '.$status.'d successfully');
//            return Redirect::to('/');
//        }else{
//            session()->flash('status', 'Unable to '.$status.' project try again');
//            return back()->withInput();
//        }
//
//
//    }
//
//    public function storeProyect(Request $request){
//
//
//        $proyecto = new Projects();
//        if($request->usuario=="default"){
//            $userid = User::where('name','=','Default')->get();
//            $proyecto->user_id = $userid[0]['id'];
//            $proyecto->name_project = $request->nombreproyecto;
//            $proyecto->general_description = $request->descripcionproyecto;
//            $newHash = Str::random(10);
//            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);
//            $proyecto->save();
//        }else{
//            $userid = User::where('id','=',$request->usuario)->get();
//            $proyecto->user_id = $userid[0]['id'];
//            $proyecto->name_project = $request->nombreproyecto;
//            $proyecto->general_description = $request->descripcionproyecto;
//            $newHash = Str::random(10);
//            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);
//            $proyecto->save();
//        }
//
//        return $proyecto->id;
//    }


    public function store(Request $request){


        $status = "Create";
        $proyecto = new Projects();
        if($request->usuario=="default"){
            $userid = User::where('name','=','Default')->get();
            $proyecto->user_id = $userid[0]['id'];
            $proyecto->name_project = $request->nombreproyecto;
            $proyecto->general_description = $request->descripcionproyecto;
            $newHash = Str::random(10);
            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);

            $proyecto->content = $this->generarXML($request);
            if ($proyecto->save()) {
                session()->flash('status', 'Project '.$status.'d successfully');
                return Redirect::to('/');
            }else{
                session()->flash('status', 'Unable to '.$status.' project try again');
                return back()->withInput();
            }


        }else{
            $userid = User::where('id','=',$request->usuario)->get();
            $proyecto->user_id = $userid[0]['id'];
            $proyecto->name_project = $request->nombreproyecto;
            $proyecto->general_description = $request->descripcionproyecto;
            $newHash = Str::random(10);
            $proyecto->share_link = filter_var(url("projects/".$proyecto->user_id.$proyecto->name_project.$newHash),FILTER_SANITIZE_URL);

            $proyecto->content = $this->generarXML($request);
            if ($proyecto->save()) {
                session()->flash('status', 'Project '.$status.'d successfully');
                return Redirect::to('/');
            }else{
                session()->flash('status', 'Unable to '.$status.' project try again');
                return back()->withInput();
            }
        }


    }

    public function show($link){

        $result = Projects::where('share_link','=',url("projects/".$link))->get();

        echo "<pre>";
        print_r($result);
    }

    private function generarXML(Request $request){
        $xml = new DomDocument('1.0', 'UTF-8');

        $proyectonombre = $xml->createElement('Proyecto');
        $proyectonombre = $xml->appendChild($proyectonombre);

        $proyecto_contenido = $xml->createElement('Contenido');
        $proyecto_contenido = $proyectonombre->appendChild($proyecto_contenido);

        // Agregar un atributo al proyecto
        $proyecto_contenido->setAttribute('descripcionproyecto', $request->descripcionproyecto);

        $material = $xml->createElement('material', $request->material);
        $material = $proyecto_contenido->appendChild($material);

        $selected_material = $xml->createElement('selected_material',$request->selected_material);
        $selected_material = $proyecto_contenido->appendChild($selected_material);

        $cables_amount = $xml->createElement('cables_amount',$request->cables_amount);
        $cables_amount = $proyecto_contenido->appendChild($cables_amount);

        $cable_type = $xml->createElement('cable_type',$request->cable_type);
        $cable_type = $proyecto_contenido->appendChild($cable_type);

        $cable_id = $xml->createElement('cable_id',$request->cable_id);
        $cable_id = $proyecto_contenido->appendChild($cable_id);

        $cable_diameter = $xml->createElement('cable_diameter',$request->cable_diameter);
        $cable_diameter = $proyecto_contenido->appendChild($cable_diameter);

        $respuestas = $xml->createElement('respuestas',$request->respuestas);
        $respuestas = $proyecto_contenido->appendChild($respuestas);

        $xml->formatOutput = true;
        $xml_generate = $xml->saveXML();

        return $xml_generate;
    }

    public function calcularTrayectoria(){
//        echo "<pre>";
//        print_r($_POST);
        $suma_num_cables = 0;
        $suma_diameter = 0;

         $html = '<h3>Para este trayecto es recomendable utilizar:</h3>';



        for($i=0; $i<= count($_POST['numcables'])-1; $i++){
            $num_cables = $_POST['numcables'][$i];
            $suma_num_cables = $suma_num_cables + $num_cables;

        }

        for($i=0; $i<= count($_POST['diameter'])-1; $i++){
            $num_diameter = $_POST['diameter'][$i];
            $suma_diameter = $suma_diameter + $num_diameter;

        }

         $idSelectedMaterial = $_POST['selected_material'];
         $isForniture = 0;
        if(isset($_POST['interior'])){
            $isForniture = 1;
        }

         $areaCables = round(pi()*pow(($suma_diameter/2),2),2);
         $totalareaCables = ($areaCables)*($suma_num_cables);

        $querry = new Projects();
        $result = $querry->callSerachTubesProcedure($totalareaCables,$suma_num_cables,$idSelectedMaterial,$isForniture);

        if(!empty($result)){
            foreach ($result as $_result) {
                $html .= '<textarea block name="respuestas" id="respuestas" value="afdasf">'.$_result->description.'" "'."\n\r".'Area ocupada: '.$totalareaCables.' mm^2'."\n" .'Total de cables:'.$suma_num_cables."\n\r".'</textarea>';
            }
        }else{
            $html .='<textarea>Prueba con otras combinaciónes, no existe material soportado :(</textarea>';
        }


        return $html;

    }

    public function editar($id){

    }
}
