@extends('layouts.app')
@section('main')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="w-100 d-flex justify-content-between">
          <div class="mb-3"><a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">
              <i class="dripicons-reply"></i> Atras</a>
          </div>
        </div>
        <h2 class="card-title">Orden</h2>
        <p class="card-title-desc">{{ $orden->numero_orden }}</p>
        <div class="container">
  			  <div class="col-xs-12">
        		<div class="invoice-title">
        			<h2>Cliente</h2>
        		</div>
      		  <hr>
      			<div class="row">
          			<div class="col-md-6">
          				<address>
          				<strong>Ruc/Cédula</strong><br>
          					Nombres y Apellidos<br>
          					Email<br>
          				</address>
          			</div>
          			<div class="col-md-6 text-lef">
          				<address>
              			<strong>{{$orden->cliente->cedula}}</strong><br>
          					{{$orden->cliente->nombres}} {{$orden->cliente->apellidos}}<br>
          					{{$orden->cliente->email}}<br>
          				</address>
          			</div>
          		</div>
      	  </div>
  		    <hr>
          <div class="row">
			      <div class="col-md-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title"><strong>Datos de Facturación</strong></h3>
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-condensed" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:16px; color:#000;font-weight:normal;border:1px solid #eaeaea;" border="0" cellspacing="0">
                           <thead>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="text-left"><strong>Ruc/Cédula</strong></td>
                                 <td class="text-left">{{$orden->pago->documento}}</td>
                              </tr>

                              <tr>
                                 <td class="text-left"><strong>Nombres y Apellidos</strong></td>
                                 <td class="text-left">{{$orden->pago->nombres}}</td>
                              </tr>

                              <tr>
                                  <td class="text-left"><strong>Dirección</strong></td>
                                 <td class="text-left">{{$orden->pago->direccion}}</td>
                              </tr>
                              <tr>
                                 <td class="text-left"><strong>Teléfono</strong></td>
                                 <td class="text-left">{{$orden->pago->telefono}}</td>
                              </tr>
                              <tr>
                                 <td class="text-left"><strong>Email</strong></td>
                                 <td class="text-left">{{$orden->pago->email}}</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title"><strong>Dirección de Envío</strong></h3>
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-condensed" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:16px; color:#000;font-weight:normal;border:1px solid #eaeaea;" border="0" cellspacing="0">
                           <thead>
                           </thead>
                           <tbody>

                              <tr>
                                 <td class="text-left"><strong>Ruc/Cédula</strong></td>
                                 <td class="text-left">{{$orden->direccion->cedula}}</td>
                              </tr>
                              <tr>
                                 <td class="text-left"><strong>Nombres y Apellidos</strong></td>
                                 <td class="text-left">{{$orden->direccion->nombres}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Teléfono</strong></td>
                                 <td class="text-left">{{$orden->direccion->telefono}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Email</strong></td>
                                 <td class="text-left">{{$orden->direccion->email}}</td>
                              </tr>
                              @if( $orden->direccion->forma_entrega == null )
                              <tr>
                                  <td class="text-left"><strong>Ciudad</strong></td>
                                 <td class="text-left">{{$orden->direccion->ciudad->nombre}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Calle Principal</strong></td>
                                 <td class="text-left">{{$orden->direccion->calle_principal}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Número de Casa</strong></td>
                                 <td class="text-left">{{$orden->direccion->numero_casa}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Calle Secundaria</strong></td>
                                 <td class="text-left">{{$orden->direccion->calle_secundaria}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Referencia</strong></td>
                                 <td class="text-left">{{$orden->direccion->referencia}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Comentario</strong></td>
                                 <td class="text-left">{{$orden->direccion->comentario}}</td>
                              </tr>
                              <tr>
                                  <td class="text-left"><strong>Forma de Entrega</strong></td>
                                 <td class="text-left">
                                   @if( $orden->direccion->ciudad->rapid == 1 )
                                    RapidService
                                   @else
                                    ServiEntrega
                                   @endif
                                 </td>
                              </tr>
                              @else
                              <tr>
                                  <td class="text-left"><strong>Forma de Entrega</strong></td>
                                 <td class="text-left">Recogida en Oficina</td>
                              </tr>
                              @endif

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

				    <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                   <h3 class="panel-title"><strong>Detalles de la Orden</strong></h3>
                </div>
                <div class="panel-body">
                   <div class="table-responsive">
                      <table width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:16px; color:#000;font-weight:normal;border:1px solid #eaeaea;" border="0" cellspacing="0" cellpadding="5">
                       <thead>
                          <tr>
                             <th style="min-width: 200px;border:1px solid #eaeaea;">Producto</th>
                             <th style="min-width: 50px;border:1px solid #eaeaea;">Precio</th>
                             <th style="min-width: 50px;border:1px solid #eaeaea;">Cantidad</th>
                             <th style="min-width: 50px;border:1px solid #eaeaea;">Total</th>
                          </tr>
                       </thead>
                        <tbody>

                          @foreach( $orden->productos as $producto )
                          @if(count($producto->fotos) > 0 && $producto->estatus == 1)
                          <tr>
                            <td style="border:1px solid #eaeaea;">
                            {{$producto->producto->nombre}}
                            </td>
                            <?php
                                                  $cantidad = 0;
                                                ?>
                                                @foreach($producto->fotos as $foto)
                                                <?php
                                                  $cantidad = $cantidad + $foto->cantidad;
                                                ?>
                                                @endforeach
                            <td style="border:1px solid #eaeaea;text-align:center;">
                            {{round($producto->total / $cantidad, 2)}}
                            </td>
                            <td style="border:1px solid #eaeaea;text-align:center;">
                            {{$cantidad}}
                            </td>
                            <td style="border:1px solid #eaeaea;text-align:center;">
                            {{$producto->total}}
                            </td>
                          </tr>
                          @endif
                          @endforeach
                          <tr>
                            <td></td><td></td>
                            <td style="border:1px solid #eaeaea;text-align:right;"><b>Subtotal<b></td>
                            <td  style="border:1px solid #eaeaea;text-align:center;">{{$orden->sub_total}}</td>
                          </tr>

                          <tr>
                            <td></td><td></td>
                            <td  style="border:1px solid #eaeaea;text-align:right;"><b>Envío<b></td>
                            <td  style="border:1px solid #eaeaea;text-align:center;">
                              @if($orden->costo_envio)
                              {{$orden->costo_envio}}
                              @else
                              0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td></td><td></td>
                            <td  style="border:1px solid #eaeaea;text-align:right;"><b>Iva<b></td>
                            <td  style="border:1px solid #eaeaea;text-align:center;">{{$orden->iva}}</td>
                          </tr>

                          <tr>
                            <td></td><td></td>
                            <td   style="border:1px solid #eaeaea;text-align:right;"><b>Total<b></td>
                            <td  style="border:1px solid #eaeaea;text-align:center;">{{$orden->total}}</td>
                          </tr>


                        </tbody>
                      </table>
                   </div>
                </div>
              </div>
            </div>
				    <hr>
					  <div class="col-md-6">&nbsp;</div>

          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- end col -->
</div>
<!-- end row -->
@endsection