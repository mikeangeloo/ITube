@extends('nav')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Nombre Proyecto</th>
                            <th>Descripción General</th>
                            <th>Link compartir</th>
                        </tr>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{$project['id']}}</td>
                            <td>{{$project['name_project']}}</td>
                            <td>{{$project['general_description']}}</td>
                            <td>{{$project['share_link']}}</td>
                            <td><a href="{{url('projects')}}">Editar</a></td>

                        </tr>
                    @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
