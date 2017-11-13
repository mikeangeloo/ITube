@extends('nav')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <a href="{{url('projects/importarXML/')}}">
                    <button type="button">Importar XML</button>
                </a>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Nombre Proyecto</th>
                            <th>Descripción General</th>
                            <th>Fecha creación</th>
                            <th>Opciones</th>
                        </tr>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{$project['id']}}</td>
                            <td>{{$project['name_project']}}</td>
                            <td>{{$project['general_description']}}</td>
                            <td>{{$project['created_at']}}</td>
                            <td>
                                <a href="{{url('projects/'.$project['id'])}}">Ver</a>
                                |
                                <a href="{{url('projects/editar/'.$project['id'])}}">Editar</a>
                                |
                                <a href="{{url('projects/elimiar/'.$project['id'])}}">Eliminar</a>
                                |
                                <a href="{{url('projects/exportarXML/'.$project['id'])}}">Exportar XML</a>


                            </td>

                        </tr>
                    @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
