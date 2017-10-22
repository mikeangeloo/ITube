@extends('nav')
@section('contenido')

<body>
<div class="form-group row">
    <div class="container">
        <div class="col-xs-12">
            <h2>Calcular Trayectorias</h2>
            <button class="btn btn-info text-right">Calcular</button>

                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>

                <button class="btn btn-warning" href="#" role="button" id="reiniciar">
                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                    Reiniciar</button>
                <!--<a class="btn btn-warning" href="#" role="button" id="reiniciar">
                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            Configuración</a>-->

            <hr class="conjunto">
        </div>


        <form class="">
            <div class="col-sm-12 col-xs-12">
                <div class="class col-sm-12">
                    <h4>Trayectoria</h4>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="tubes_id">Material a utilizar:</label>
                    <select class="form-control" name="material" id="material">
                        <option value="0" selected>---</option>
                        <option value="1">Tubos</option>
                        <option value="2">Charolas</option>
                        <option value="3">Canaletas</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3" name="ajaxSelect" id="ajaxSelect">
                    <label for="cable_id">Categoría</label>
                    <select class="form-control" name="selected_material" id="selected_material">

                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" name="material_type" id="material_type">

                    </select>
                </div>
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
                    <label for="tubes_id">Tipo de cable:</label>
                    <select class="form-control" name="tubes_id" id="tubes_id">

                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label for="cable_id">Cable:</label>
                    <select class="form-control" name="cable_id" id="cable_id">

                    </select>
                </div>
            </div>








        </form>
    </div>
</div>
@endsection

</body>
</html>

