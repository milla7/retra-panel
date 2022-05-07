@extends('layouts.app')
@section('main')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Clientes</p>
                        <h4 class="mb-0"> {{ App\Cliente::all()->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="ri-shield-user-line font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Ordenes</p>
                        <h4 class="mb-0"> {{ App\Orden::whereHas('pago')->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-photo-group font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Ordenes En Proceso</p>
                        <h4 class="mb-0"> {{ App\Orden::where('id_estatus', 1)->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-photo-group font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Ordenes Despachadas</p>
                        <h4 class="mb-0"> {{ App\Orden::where('id_estatus', 2)->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-photo-group font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Ordenes Por Confirmar Pago</p>
                        <h4 class="mb-0"> {{ App\Orden::where('id_estatus', 3)->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-photo-group font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Ordenes Canceladas</p>
                        <h4 class="mb-0"> {{ App\Orden::where('id_estatus', 4)->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-photo-group font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Cupones</p>
                        <h4 class="mb-0"> {{ App\Cupon::all()->count() }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-ticket font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($producto) > 0)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body overflow-hidden">
                        <p class="text-truncate font-size-14 mb-2">Producto más Vendido</p>
                        <h4 class="mb-0 font-size-18"> {{ $nombre }} </h4>
                    </div>
                    <div class="text-primary">
                        <i class="dripicons-camera font-size-24"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection