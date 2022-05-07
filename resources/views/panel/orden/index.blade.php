@extends('layouts.app')
@section('main')

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

                <div class="w-100 d-flex justify-content-between">
                    <div class="mb-3"><a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm">
                        <i class="dripicons-reply"></i> Atras</a>
                    </div>
                </div>

                <h4 class="card-title">Ordenes</h4>
                <div class="table-responsive">
                    <table id="tabla" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>N° Orden</th>
                            <th>Fecha</th>
                            <th style="width: 200px">Comentario</th>
                            <th>Iva</th>
                            <th>Costo Envío</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($ordenes as $orden)
                            <tr>
                                <td>{{$orden->numero_orden}}</td>
                                <td>{{$orden->fecha}}</td>
                                <td style="width: 200px">
                                    <a href="#" id="comentario" class="comentarios" data-type="textarea" data-pk="{{$orden->id}}" data-url="/api/ordenes/{{$orden->id}}/comentario" data-value="{{$orden->direccion->comentario}}" data-title="">
                                </td>
                                <td>{{$orden->iva}}</td>
                                <td>{{$orden->costo_envio}}</td>
                                <td>{{$orden->sub_total}}</td>
                                <td>{{$orden->total}}</td>

                                <td align="center" id="orden_{{$orden->id}}">
                                    <a href="#" id="precio" class="@if($orden->id_estatus == 1 || $orden->id_estatus == 3) c_1 @endif orden_{{$orden->id}}" data-type="select" data-pk="{{$orden->id}}" data-url="/api/ordenes/{{$orden->id}}" data-value="{{$orden->id_estatus}}" data-title="Seleccione un estatus">
                                        <span class="badge @if($orden->id_estatus == 1)
                                        badge-primary
                                        @elseif($orden->id_estatus == 2)
                                        badge-success
                                        @elseif($orden->id_estatus == 3)
                                        badge-warning
                                        @else
                                        badge-danger
                                        @endif
                                        ">
                                            {{$orden->estatus->nombre}}
                                        </span>

                                    </a>
                                </td>

                                <td align="center">

                                    <a href="/ordenes/{{$orden->id}}" title="Detalle" class="btn btn-dark btn-sm waves-effect waves-dark"><i class="dripicons-to-do"></i></a>



                                </td>
                            </tr>
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


<script type="text/javascript">
    $(function() {
        $('#tabla').DataTable({
            "order": [[ 1, "des" ]],
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
                        console.log(response)
                       /*$('#error').attr('hidden', 'hidden');
                       $('#success').attr('hidden', 'hidden');*/

                      if(response.status == 'error'){
                        $('#error').removeAttr('hidden');
                         setTimeout( function(){
                          $('#error').attr('hidden', 'hidden');
                        }, 2000);
                        return '';

                      }else{



                        /*$('#success').removeAttr('hidden');
                        setTimeout(function(){
                          $('#success').attr('hidden', 'hidden');
                        }, 2000);*/

                      }


                    },

                    source:
                    [
                        {
                            value: 1,
                            text: 'En Proceso'
                        },
                        {
                            value: 2,
                            text: 'Despachado'
                        },
                        {
                            value: 3,
                            text: 'Procesando Pago'
                        },
                        {
                            value: 4,
                            text: 'Cancelado'
                        }
                    ]

                }),
                $(".comentarios").editable({

                    type: "text",
                    emptytext: 'Agregar Comentario',
                    mode: "inline",
                    inputclass: "form-control-sm",
                    success: function(response, newValue) {
                        console.log(response)




                    }

                })

            }
        });

      });
</script>
@endsection