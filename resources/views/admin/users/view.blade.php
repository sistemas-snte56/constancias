@extends('adminlte::page')

@section('title', 'User | Ver')

@section('content_header')
<h1>ADMINISTRACIÓN DE USER</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header" style="background-color: #ee7a00">
        <h4 style="color: #FFFFFF"><strong>INFORMACIÓN DEL SECRETARIO</strong></h4>
    </div>
    <div class="card-body">
        <div class="card-body">
            <p class="card-text col-span-6 sm:col-span-4 ">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="delegacionSelect">DELEGACIÓN</label>
                                    <select id="delegacionSelect" class="form-control">
                                        <option>{!! $user->delegacion->delegacion !!}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">NOMBRE</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="{!! $user->name !!}">
                                </div>
                                <div class="form-group">
                                    <label for="apaterno">PRIMER APELLIDO</label>
                                    <input type="text" id="apaterno" name="apaterno" class="form-control" placeholder="{!! $user->apaterno !!}"  >
                                </div>

                                <div class="form-group">
                                    <label for="amaterno">SEGUNDO APELLIDO</label>
                                    <input type="text" id="amaterno" name="amaterno" class="form-control" placeholder="{!! $user->amaterno !!}"  >
                                </div>

                                <div class="form-group">
                                    <label for="genero">GENERO</label>
                                    <input type="text" id="genero" name="genero" class="form-control" placeholder="{!! $user->genero->genero !!}"  >
                                </div>
                                    
                                <div class="form-group">
                                    <label for="telefono">TELÉFONO</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="{!! $user->telefono !!}"  >
                                </div>

                                <div class="form-group">
                                    <label for="email">CORREO ELECTRÓNICO</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="{!! $user->email !!}"  >
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-left">
                                            <a href="{{ route('user.index') }}" class="btn btn-info">
                                                <i class="fas fa-arrow-left"></i> Regresar
                                            </a>
                                        </div>
                                        <div class="float-right">
                                            <a href="{{route('user.edit',$user)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </p>
            
        </div>

    </div>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @if(session('update'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('update') }}"
                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    text: "La información del usuario se ha modificado satisfactoriamente.",
                    // showConfirmButton: false,
                    // timer: 2000
                });
            });
        </script>
    @endif
@stop