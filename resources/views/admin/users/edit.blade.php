@extends('adminlte::page')

@section('title', 'User | Edit')

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
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Input Delegacion --}}
                            <x-adminlte-select name="delegacion" label="Delegación" label-class="text-secondary">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-secundary">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </x-slot>
                                <option value="">Seleccionar delegación</option>
                                @foreach ($delegaciones as $delegacion)
                                    <option value="{{ $delegacion->id }}" {{ old('delegacion', $user->delegacion->id ?? '') == $delegacion->id ? 'selected' : '' }}>
                                        {{ $delegacion->delegacion }} / {{ $delegacion->sede }} / {{ $delegacion->nivel }}
                                    </option>
                                @endforeach
                            </x-adminlte-select>

                            {{-- Input Nombre --}}
                            <x-adminlte-input name="name" id="name" label="Nombre" placeholder="Nombre" label-class="text-secondary " value="{{ old('name', $user->name) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-secondary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            {{-- Input Apellido Materno --}}
                            <x-adminlte-input name="apaterno" id="apaterno" label="Primer apellido" placeholder="Apellido paterno" label-class="text-secondary " value="{{ old('apaterno', $user->apaterno) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-secondary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            {{-- Input Apellido Materno --}}
                            <x-adminlte-input name="amaterno" id="amaterno" label="Segundo apellido" placeholder="Apellido materno" label-class="text-secondary " value="{{ old('amaterno', $user->amaterno) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-secondary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            {{-- Input Genero --}}
                            <x-adminlte-select name="genero" label="GÉNERO" label-class="text-secondary">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fas fa-venus-mars text-secondary"></i>
                                    </div>
                                </x-slot>
                                <option value="{{$user->genero->id}}">{{$user->genero->genero}}</option>
                                @foreach ($generos as $id => $genero)
                                    <option value="{{ $id }}" {{ old('genero', $user->genero ?? '') == $id ? 'selected' : '' }}>{{ $genero }}</option>
                                @endforeach
                            </x-adminlte-select>
                            
                            {{-- Input telefono --}}                            
                            <x-adminlte-input name="telefono" id="telefono" label="Teléfono" placeholder="Número telefónico" label-class="text-secondary " value="{{ old('telefono', $user->telefono) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-phone text-secondary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            
                            {{-- Input email --}}
                            <x-adminlte-input name="email" id="email" label="Correo electrónico" placeholder="Email" label-class="text-secondary " value="{{ old('email', $user->email) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-envelope text-secondary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>                            
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-left">
                                            <a href="{{ url()->previous() }}" class="btn btn-info">
                                                <i class="fas fa-arrow-left"></i> Cancelar
                                            </a>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Guardar
                                            </button>
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
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop