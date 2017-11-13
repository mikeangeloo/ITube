@extends('nav')
@section('contenido')

    <body xmlns="http://www.w3.org/1999/html">
    <div class="form-group row">
        <div class="container">
            @if(session()->has('status'))
                <p class="alert alert-info">
                    {{	session()->get('status') }}
                </p>
            @endif
            <div class="col-xs-12">

                <h2>Detalles Proyecto</h2>
                <button class="btn btn-primary" type="button" name="editar" id="editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Editar</button>
                <button class="btn btn-warning" role="button" id="pdf" name="pdf">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    Exportar PDF</button>
                <!--<a class="btn btn-warning" href="#" role="button" id="reiniciar">
                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            Configuración</a>-->

                <hr class="conjunto">
            </div>


            {{--<form class="" name="formulario" id="formulario" action="projects" method="POST">--}}
            <form class="" name="formulario" id="formulario" action="{{url('pdfview')}}" method="POST" target="_blank">


                {{ csrf_field() }}
                <?php $xml = simplexml_load_string($result[0]["content"]);?>
                {{--<input type="submit" value="Probar">--}}
                <div class="col-sm-12 col-xs-12">

                    <div class="col-sm12 col-xs-12">
                        <label for="nombreproyecto">Nombre de proyecto:</label>
                        <input type="text" name="nombreproyecto" id="nombreproyecto" value="<?php echo $result[0]["name_project"];?>">

                    </div>
                    <div class="col-sm12 col-xs-12">
                        <br>
                        <label for="descripcionproyecto">Descripción:</label>
                        <input type="text" name="descripcionproyecto" id="descripcionproyecto" value="<?php echo $result[0]["general_description"];?>">
                        <hr class="conjunto3">
                    </div>


                    <div class="col-xs-12 col-sm-3">

                        <label for="material">Material a utilizar:</label>
                        <select class="form-control" name="material" id="material">
                            @if($xml->Contenido->material == 0)
                            <option value="0" data-material="default" selected>---</option>
                            @endif
                                @if($xml->Contenido->material == 1)
                                <option value="1" data-material="Tubos" selected>Tubos</option>
                                @endif
                                    @if($xml->Contenido->material == 2)
                                    <option value="2,charolas" selected>Charolas</option>
                                @endif
                                        @if($xml->Contenido->material == 3)
                                         <option value="3,canaletas" selected>Canaletas</option>
                                @endif
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3" name="ajaxSelect" id="ajaxSelect">

                        <label for="selected_material">Categoría</label>
                        <select class="form-control" name="selected_material" id="selected_material">
                            <option data-tubename="<?php echo $xml->Contenido->tubo;?>" value="<?php echo $xml->Contenido->selected_material;?>">
                                <?php echo $xml->Contenido->tubo;?>
                            </option>

                        </select>
                    </div>
                    {{--<div class="col-xs-12 col-sm-3">--}}
                    {{--<label for="tipo">Tipo:</label>--}}
                    {{--<select class="form-control" name="material_type" id="material_type">--}}

                    {{--</select>--}}
                    {{--</div>--}}
                    <div class="col-xs-12 col-sm-3">

                        <label for="interior">¿Es Mobiliario? Si:</label>
                        <input type="checkbox" name="interior" id="interior">
                    </div>

                </div>

                <div class="col-sm-12 col-xs-12">
                    <hr class="conjunto2">

                    <br>
                    <div class="col-sm-12">

                        <h3>Resumen de cables </h3>
                        <table name="resumen" id="resumen" class="table table-bordered">
                            <th>Número de Cables</th>
                            <th>Tipo Cable</th>
                            <th>Cable</th>
                            <th>Diametro exterior</th>

                            @foreach($xml->Contenido->cables->cable as $item)
                                <tr>
                                    <td><input type="text" class="form-control" name="numcables[]" readonly="" value="<?php echo $item->numero;?>"></td>
                                    <td><input type="text" class="form-control" name="tipocable[]" readonly="" value="<?php echo $item->tipo;?>"></td>
                                    <td><input type="text" class="form-control" name="cable[]" readonly="" value="<?php echo $item->nombre;?>"></td>
                                    <td><input type="text" class="form-control" name="diameter[]" readonly="" value="<?php echo $item->diametro_exterior;?>"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>


                    <input type="hidden" name="use_material" id="use_material" value="Tubo">
                    <input type="hidden" name="material_description" id="material_description" value="<?php echo $xml->Contenido->tubo;?>">
                    @if (Route::has('login'))
                        @auth
                        <input type="hidden" name="usuario" id="usuario" value="{{$user->id}}">
                    @else

                        <input type="hidden" name="usuario" id="usuario" value="default">
                        @endauth
                    @endif




                    <div class="col-xs-12 col-sm-12" name="resultados" id="resultados">
                        <br>
                        <h3>Resultados: </h3>
                        <textarea name="respuestas" id="respuestas">{{$xml->respuesta}}
                        </textarea>


                    </div>
                </div>
            </form>



        </div>
    </div>
    @endsection

    </body>

    </html>

