@extends('nav')
@section('contenido')

<body xmlns="http://www.w3.org/1999/html">
<div class="form-group row">
    <div class="container">
        <div class="col-xs-12">
            <h2>Calcular Trayectorias</h2>

                <button class="btn btn-info text-right" type="button" name="calcular" id="calcular">Calcular</button>
                <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
                <button class="btn btn-warning" role="button" id="pdf" name="pdf">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    Exportar PDF</button>
                <!--<a class="btn btn-warning" href="#" role="button" id="reiniciar">
                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            Configuración</a>-->

            <hr class="conjunto">
        </div>


        <form class="" name="formulario" id="formulario" action="calcular" method="POST">
            {{--<button type="submit">ddd</button>--}}

            {{ csrf_field() }}

            <div class="col-sm-12 col-xs-12">
                <div class="col-sm-12">
                    <h4>Trayectoria</h4>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="material">Material a utilizar:</label>
                    <select class="form-control" name="material" id="material">
                        <option value="0" selected>---</option>
                        <option value="1">Tubos</option>
                        <option value="2">Charolas</option>
                        <option value="3">Canaletas</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3" name="ajaxSelect" id="ajaxSelect">
                    <label for="selected_material">Categoría</label>
                    <select class="form-control" name="selected_material" id="selected_material">

                    </select>
                </div>
                {{--<div class="col-xs-12 col-sm-3">--}}
                    {{--<label for="tipo">Tipo:</label>--}}
                    {{--<select class="form-control" name="material_type" id="material_type">--}}

                    {{--</select>--}}
                {{--</div>--}}
                <div class="col-xs-12 col-sm-3">
                    <label for="interior">¿Es para interior? Si:</label>
                    <input type="checkbox" name="interior" id="interior">
                </div>

            </div>

            <div class="col-sm-12 col-xs-12">
                <hr class="conjunto2">

                <div class="col-xs-12 col-sm-3">

                    <label for="cables_amount">Número de Cables:</label>
                    <input type="number" class="form-control" id="cables_amount" name="cables_amount" value="1" min="1">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="cable_type">Tipo de cable:</label>
                    <select class="form-control" name="cable_type" id="cable_type">

                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="cable_id">Cable:</label>
                    <select class="form-control" name="cable_id" id="cable_id">

                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="cable_diameter">Diametro exterior (mm):</label>
                    <input class="form-control" name="cable_diameter" id="cable_diameter">
                </div>
            </div>
            <input type="hidden" name="use_material" id="use_material">
        </form>

        <div class="col-xs-12 col-sm-12" name="resultados" id="resultados">
            <br>
            <h3>Resultados: </h3>

        </div>
    </div>
</div>
@endsection

</body>
</html>

