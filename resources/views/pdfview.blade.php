<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Itube PDF</title>

    {!! Html::style('css/styles.css') !!}



</head>

<body>
<style type="text/css">

    table td, table th{

        border:1px solid black;

    }

</style>

<div class="container">
    <div class="contenidoimg">
    {{ HTML::image('storage/logoItube.png', 'logoItube', array('class' => 'imgLogo')) }}
    </div>
    <h1>Resumen de Trayectorias</h1>
    <h5 style="text-align: right">Fecha: {{ date("Y-m-d", time())}}</h5>
    <h5 style="text-align: right">PDF generado por: ITube® Plataform</h5>

    <br/>


    <table>

        <tr>



            <th>Titulo</th>
            <th>Descripción</th>

        </tr>



        @foreach ($items as $item)
            <tr>
                <td>Material usado:</td><td> {{$item['use_material']}}</td>
            </tr>
            <tr>
                <td>Categoría utilizada:</td><td> {{$item['tubename']}}</td>
            </tr>
        @if(isset($item['interior']))
            <tr>

                <td>¿Es para interior?:</td><td>Si</td>
            </tr>
        @else
            <tr>

                <td>¿Es para interior?:</td><td>No</td>
            </tr>
        @endif
            <tr>
                <td>Cantidad de cables usados: </td><td>{{$item['cables_amount']}}</td>
            </tr>
            <tr>
                <td>Tipo de cable: </td><td>{{$item['cablename_type']}}</td>
            </tr>
            <tr>
                <td>Nombre del cable: </td><td>{{$item['cablename']}}</td>
            </tr>
            <tr>
                <td>Diametro del cable: </td><td>{{$item['cable_diameter']}}mm</td>
            </tr>
            <tr>
                <td>Resumen del calculo: </td><td>{{$item['respuestas']}}</td>
            </tr>






        @endforeach

    </table>

</div>
</body>
</html>