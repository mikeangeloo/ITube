<style type="text/css">

    table td, table th{

        border:1px solid black;

    }

</style>

<div class="container">
    <h1>Resumen de Trayectorias</h1>


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
                <td>Categoría utilizada:</td><td> {{$item['selected_material']}}</td>
            </tr>
            <tr>
                <td>¿Es para interior?:</td><td> {{$item['interior']}}</td>
            </tr>
            <tr>
                <td>Cantidad de cables usados: </td><td>{{$item['cables_amount']}}</td>
            </tr>
            <tr>
                <td>Tipo de cable: </td><td>{{$item['cable_type']}}</td>
            </tr>
            <tr>
                <td>Nombre del cable: </td><td>{{$item['cables_amount']}}</td>
            </tr>
            <tr>
                <td>Diametro del cable: </td><td>{{$item['cable_diameter']}}</td>
            </tr>
            <tr>
                <td>Resumen del calculo: </td><td>{{$item['respuestas']}}</td>
            </tr>






        @endforeach

    </table>

</div>