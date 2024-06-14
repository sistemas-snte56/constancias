@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    
    <div class="card">
            <div class="card-header" style="background-color: #ee7a00;">
                <h4 style="color:#FFFFFF;"><strong>LISTADO DE SECRETARIOS</strong></h4>
            </div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title"><strong>SECRETARIOS GENERALES Y REPRESENTANTES DE C.T.s DE LA SECCIÓN 56</strong></h5>
                <p class="card-text">
                    {{-- Setup data for datatables --}}
                    @php
                        $heads = [
                            'ID',
                            'REGIÓN', 
                            'DELEGACION', 
                            'NIVEL', 
                            'SEDE', 
                            'SECRETARIO GENERAL / REPRESENTANTE DE C.T.', 
                            'EMAIL', 
                            ['label' => 'ACCIONES', 'no-export' => true, 'width' => 8]
                        ];

                        $btnEdit = '';
                        $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>';
                        $btnDetails = '';

                        $config = [
                            // 'order' => [[0, 'asc'],  [4 , 'asc']],

                            'order' => [3 , 'asc'],

                            'columns' => [
                                ['orderable' => false,'visible' => true],
                                ['orderable' => false,'visible' => true],
                                ['orderable' => false, 'visible' => true], 
                                ['orderable' => false, 'visible' => false], 
                                ['orderable' => false, 'visible' => false], 
                                ['orderable' => false,'visible' => true], 
                                ['orderable' => false,'visible' => true], 
                                ['orderable' => false,'visible' => true], 
                            ],

                            'language' => [
                                'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                            ],
                            'lengthMenu' => [50,100,500],
                            'searching' => true,
                            'paging' => true,
                            'info' => true,
                        ];
                    @endphp

                    <x-adminlte-datatable id="delegaciones" :heads="$heads" :config="$config" striped hoverable bordered compressed>
                        @php $contador = 1; @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{!! $user->id !!}</td>
                                    <td>{{$user->delegacion->region->region}} - {{$user->delegacion->region->sede}}</td>
                                    <td> {{ $user->delegacion->delegacion }} </td>
                                    <td> {{ $user->delegacion->sede }} </td>
                                    <td> {{ $user->delegacion->nivel }} </td>
                                    <td>{!! $user->name !!} {!! $user->apaterno !!} {!! $user->amaterno !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>
                                        

                                        <a href="{{route('user.show',$user)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Mostrar">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>                            


                                        <a href="{{route('user.edit',$user)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a> 

                                        <form action="" method="post" class="formEliminar" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @php
                            $numeroLista = 0;
                        @endphp
                    </x-adminlte-datatable>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop