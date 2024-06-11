@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    
    <div class="card">
            <div class="card-header" style="background-color: #ee7a00; text">
                <h4 style="color: white;"><strong>Contenido</strong></h4>
            </div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Welcome to this beautiful admin panel.</h5>
                <p class="card-text">
                    {{-- Setup data for datatables --}}
                    @php
                        $heads = [
                            'NO',
                            'ID',
                            'REGIÓN', 
                            'DELEGACION', 
                            'NIVEL', 
                            'SEDE', 
                            'INICIO', 
                            'FINAL', 
                            ['label' => 'ACCIONES', 'no-export' => true, 'width' => 15]
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
                                ['orderable' => true, 'visible' => true], 
                                ['orderable' => false,'visible' => true], 
                                ['orderable' => false,'visible' => true], 
                                ['orderable' => false,'visible' => true], 
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
                                    <td>{!! $user->name !!} {!! $user->apaterno !!} {!! $user->amaterno !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->telefono !!}</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        {{ $btnDetails }}
                                        <a href="#" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Mostrar">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>                            

                                        <form action="" method="post" class="formEliminar" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>

                                        <a href="#" target="_blank" class="btn btn-xs buttons-print btn-default  mx-1 " title="Imprimir hoja">
                                            <i class="fas fa-fw fa-lg fa-print"></i>
                                        </a>                            

                                        <a href="#" target="_blank" class="btn btn-xs buttons-print btn-default  mx-1 " title="Imprimir hoja">
                                            <i class="fas fa-fw fa-lg fa-edit"></i>
                                        </a>                            
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