@extends('nav')
@section('contenido')
        <div class="col-lg-8 box-form">
            <div class="col-sm-12 col-lg-12 text-center">

                <h3> Editar perfil</h3>
                {!! Html::image("uploads/usersprofile/{$user->image}",'userimg',['class'=>'imgperfil']) !!}
                <hr class="conjunto2">
            </div>

            <form method="post" enctype="multipart/form-data" action="{{url('user/update')}}">

                <div>
                    <label for="user_name" class="required">Nombre</label>
                    <input id="user_name" name="user_name" required="required" class="form-control" value="{{$user->name}}" type="text">
                </div>
                <div>
                    <label for="user_email" class="required">Email</label>
                    <input id="user_email" name="user_email" required="required" class="form-control email-input" value="{{$user->email}}" type="email">
                </div>
                <div>
                    <label for="user_image">Foto de perfil</label>
                    <input id="user_image" name="user_image" class="form-control form-image" type="file">
                </div>
                <div>
                    <button type="submit" id="user_save" name="user_save" class="form-submit btn btn-primary btn-lg pull-right pad-top">Guardar cambios</button>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
            <div class="clearfix"></div>
        </div>
@endsection