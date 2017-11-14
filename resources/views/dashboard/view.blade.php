
@extends('nav')
@section('contenido')

<div class="container">
    <div class="row">



        <div class="col-xs-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#proyectos">Mis Proyectos</a></li>
                    <li><a data-toggle="tab" href="#materiales">Mis Materiales</a></li>
                    <li><a data-toggle="tab" href="#Importar">Importar</a></li>
                </ul>

                <div class="tab-content">
                    <div id="proyectos" class="tab-pane fade in active">
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
                                            <a href="{{ route('projects.show',$project['id']) }}">Ver</a>
                                            |
                                            <a href="{{ route('projects.edit',$project['id']) }}">Editar</a>
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
                    <div id="materiales" class="tab-pane fade">
                        <h3>Mis Materiales</h3>
                        <p>Aquí van los materiales propios</p>
                    </div>
                    <div id="Importar" class="tab-pane fade">

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
