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



        @foreach ($items as $key => $item)

            <tr>

                <td>{{ ++$key }}</td>

                <td>{{$item}}</td>




            </tr>

        @endforeach

    </table>

</div>