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
                <div class="w-100 d-flex justify-content-between">

                    <div class="mb-3"><a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm">
                        <i class="dripicons-reply"></i> Atras</a>
                    </div>



                </div>

                <h4 class="card-title">Clientes</h4>

				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Dirección</th>
                        <th>Email</th>
						<th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nombres}}</td>
                            <td>{{$cliente->apellidos}}</td>
                            <td>{{$cliente->cedula}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->email}}</td>
    						<td align="center">
    							@if( $cliente->estatus == 1 )
    							<span class="badge badge-success">Activo</span>
    							@else
    							<span class="badge badge-danger">Inactivo</span>
    							@endif
    						</td>
                            <td align="center">
                            	@if( $cliente->estatus == 1 )
                            	<a href="/clientes/{{$cliente->id}}/estatus" title="Desactivar" class="btn btn-danger btn-sm waves-effect waves-dark"><i class="dripicons-thumbs-down"></i></a>
                            	@else
                            	<a href="/clientes/{{$cliente->id}}/estatus" title="Activar" class="btn btn-success btn-sm waves-effect waves-dark"><i class="dripicons-thumbs-up"></i></a>
                            	@endif
                                <a href="/clientes/{{$cliente->id}}/ordenes" title="Ordenes" class="btn btn-dark btn-sm waves-effect waves-dark"><i class="dripicons-photo-group"></i></a>



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