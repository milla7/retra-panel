@extends('layouts.app')
@section('main')
<style>
    table thead th {
            white-space: nowrap;
            text-align: center;
        }

        table tbody td {
            white-space: nowrap;
            text-align: center;
        }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            	@if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Felicitaciones!</strong> {!! session()->get('success') !!}.
                    </div>
                @endif

                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" hidden="">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Felicitaciones!</strong> La constante ha sido editada con exito.
                </div>

                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error" hidden="">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> Ingrese un valor numérico.
                </div>

                <div class="w-100 d-flex justify-content-between">
                    <div class="mb-3"><a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm">
                        <i class="dripicons-reply"></i> Atras</a>
                    </div>
                </div>

                <h4 class="card-title">Productos</h4>
                <div class="table-responsive">

    				<table id="tabla" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Precio 1</th>
                            <th>Precio 2</th>
                            <th>Precio 3</th>
                            <th>Precio 4</th>
                            <th>Precio 5</th>
                            <th>Precio Max</th>
                            <th>Precio Min</th>
                            <th>Precio Emp</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($productos as $producto)
                            @foreach($producto->dimensiones as $dimension)
                            <tr>
                                <td>{{$producto->nombre}} ({{$dimension->dimensiones}})</td>
                                <td>{{$producto->categoria->nombre}}</td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    <a href="#" id="precio" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio}}</a>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    -
                                    @else
                                    <a href="#" id="precio_1" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_1}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    -
                                    @else
                                    <a href="#" id="precio_2" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_2}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    -
                                    @else
                                    <a href="#" id="precio_3" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_3}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    -
                                    @else
                                    <a href="#" id="precio_4" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_4}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if( $producto->id == 8 || $producto->id == 9 || $producto->id == 10 || $producto->id == 11 )
                                    -
                                    @else
                                    <a href="#" id="precio_5" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_5}}</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="#" id="precio_max" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_max}}</a>
                                </td>

                                <td>
                                    <a href="#" id="precio_min" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_min}}</a>
                                </td>

                                <td>
                                    <a href="#" id="precio_emp" class="c_1" data-type="text" data-pk="{{$producto->id}}" data-url="/api/productos/{{$producto->id}}" data-title="Enter username">{{$producto->precio_emp}}</a>
                                </td>

                            </tr>
                            @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section('js')
<script src="/assets/libs/moment/min/moment.min.js"></script>
<script src="/assets/libs/bootstrap-editable/js/index.js"></script>
<script >

  $(function() {
    $('#tabla').DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
        "fnRowCallback": function( nRow, mData, iDisplayIndex, iDisplayIndexFull) {
            $.fn.editable.defaults.ajaxOptions = {type: "POST"};
            $.fn.editableform.buttons = '<button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light mt-1 mr-1"><i class="mdi mdi-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light mt-1"><i class="mdi mdi-close"></i></button>', $(".c_1").editable({
                type: "number",
                mode: "inline",
                inputclass: "form-control-sm",
                success: function(response, newValue) {
                  $('#error').attr('hidden', 'hidden');
                   $('#success').attr('hidden', 'hidden');
                  if(response.status == 'error'){
                    $('#error').removeAttr('hidden');
                     setTimeout( function(){
                      $('#error').attr('hidden', 'hidden');
                    }, 2000);
                    return '';

                  }else{
                    $('#success').removeAttr('hidden');
                    setTimeout(function(){
                      $('#success').attr('hidden', 'hidden');
                    }, 2000);

                  }


                }

            })

        }
    });

});
</script>
@endsection