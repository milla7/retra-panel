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
                    <strong>Felicitaciones!</strong> El cupon ha sido editado con exito.
                </div>

                <div class="w-100 d-flex justify-content-between">
                    <div class="mb-3"><a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm">
                        <i class="dripicons-reply"></i> Atras</a>
                    </div>
                    <form action="/cupones" method="post">
                        @csrf
                        <div class="form-group mb-0 position-relative">
                            <div class="input-group">
                                <input type="number" min="1" name="cantidad" id="cupon" class="form-control @error('cantidad') is-invalid @enderror" placeholder="Cantidad" >
                                <input type="number" min="1" name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror" placeholder="Monto" >
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit">Crear Cupones</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <h4 class="card-title">Cupones</h4>

				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Entregado</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach($cupones as $cupon)
                        <tr>
                            <td>{{$cupon->codigo}}</td>
                            <td>$ {{$cupon->monto}}</td>
                            <td>{{$cupon->fecha}}</td>


    						<td align="center">
    							<a href="#" id="estatus" class="c_1" data-type="select" data-pk="{{$cupon->id}}" data-url="/api/cupones/{{$cupon->id}}" data-value="{{$cupon->estatus}}" data-title="Seleccione un estatus">
                                    @if($cupon->estatus == 1)
                                    <span class="badge badge-success">Disponible</span>
                                    @else
                                    <span class="badge badge-danger">Aplicado</span>
                                    @endif
                                </a>
    						</td>
                            <td>
                                <a href="#" id="entregado" class="c_2" data-type="select" data-pk="{{$cupon->id}}" data-url="/api/cupones/{{$cupon->id}}" data-value="{{$cupon->entregado}}" data-title="Seleccione un estatus">
                                    @if($cupon->entregado == 1)
                                    <span class="badge badge-danger">Entregado</span>
                                    @else
                                    <span class="badge badge-success">Disponible</span>
                                    @endif
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

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
    $.fn.editable.defaults.ajaxOptions = {type: "POST"};

    $.fn.editableform.buttons = '<button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light mt-1 mr-1"><i class="mdi mdi-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light mt-1"><i class="mdi mdi-close"></i></button>',
        $(".c_1").editable({

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
            },
            source:
            [
                {
                    value: 0,
                    text: 'Aplicado'
                },
                {
                    value: 1,
                    text: 'Disponible'
                }
            ]

        })

        $(".c_2").editable({

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


            },
            source:
            [
                {
                    value: 1,
                    text: 'Entregado'
                },
                {
                    value: 0,
                    text: 'Disponible'
                }
            ]

        })

});
</script>
@endsection