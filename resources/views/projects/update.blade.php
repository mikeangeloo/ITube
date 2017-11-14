<body xmlns="http://www.w3.org/1999/html">
@extends('nav')
@section('contenido')

    <div class="form-group row">
        <div class="container">
            @if(session()->has('status'))
                <p class="alert alert-info">
                    {{	session()->get('status') }}
                </p>
            @endif


                {{ Form::model($result, ['url' => route('projects.update',$result[0]['id']), 'method' => 'PUT']) }}
                <div class="col-xs-12">

                    <h2>Editar Proyecto</h2>
                    <a href="{{url('dashboard/view')}}"><button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Volver</button></a>
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Actualizar</button>

                    <hr class="conjunto">
                </div>


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


                    <div class="col-xs-12 col-sm-12">

                        <h5 style="text-align: center">Material seleccionado</h5>

                        <div class="col-xs-12 col-sm-3">
                            @foreach($xml->Contenido->conducto as $item)
                                <p name="selected_material2" id="selected_material2" data-tubename2="<?php echo $item->tubo["nombre"];?>"><b>Nombre: </b><?php echo $item->tubo["nombre"];?></p>
                                <p><b>Tamaño comercial: </b><?php echo $item->tubo["tamano_comercial"];?>" "</p>
                                <p><b>Diametro Interior: </b><?php echo $item->tubo["diametro_interior"];?>mm</p>
                            @endforeach

                            <select class="form-control" name="material" id="material">
                            @foreach($xml->Contenido->material as $material_item)
                               

                            @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3" name="ajaxSelect" id="ajaxSelect">

                            <label for="selected_material">Categoría</label>
                            <select class="form-control" name="selected_material" id="selected_material">

                            </select>
                        </div>



                        <div class="col-xs-12 col-sm-12">
                            <b>¿Es Mobiliario? Si:</b>
                            @if($xml->Contenido->interior == "true")
                                <input type="checkbox" checked disabled>
                                <input type="hidden" name="interior" id="interior" checked>
                            @else
                                <input type="checkbox" disabled>

                            @endif
                        </div>

                    </div>

                    <div class="col-sm-12 col-xs-12">
                        <hr class="conjunto2">

                        <br>
                        <div class="col-sm-12">

                            <h3>Resumen de cables </h3>
                            <a href="{{url('dashboard/view')}}"><button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Volver</button></a>
                            <button class="btn btn-info text-right" type="button" name="calcular" id="calcular"><span class="glyphicon glyphicon-console" aria-hidden="true"></span>Re-calcular</button>

                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Actualizar</button>


                            <hr class="conjunto">
                            <table name="resumen" id="resumen" class="table table-bordered">
                                <th>Número de Cables</th>
                                <th>Tipo Cable</th>
                                <th>Cable</th>
                                <th>Diámetro exterior</th>
                                <th>Área Total</th>

                                @foreach($xml->Contenido->cables->cable as $item)
                                    <tr>
                                        <td><input type="text" class="form-control" name="numcables[]" readonly="" value="<?php echo $item->numero;?>"></td>
                                        <td><input type="text" class="form-control" name="tipocable[]" readonly="" value="<?php echo $item->tipo;?>"></td>
                                        <td><input type="text" class="form-control" name="cable[]" readonly="" value="<?php echo $item->nombre;?>"></td>
                                        <td><input type="text" class="form-control" name="diameter[]" readonly="" value="<?php echo $item->diametro_exterior;?>"></td>
                                        <td><?php echo $item->area_cables;?>mm<sup>2</sup></td>
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


