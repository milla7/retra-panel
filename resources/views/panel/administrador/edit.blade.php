@extends('layouts.app')
@section('main')
<div class="row">
    <div class="col-lg-3">
            &nbsp;
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos</h4>
                <form action="/admin/{{$admin->id}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"
                                value=" {{ $admin->nombres }} ">
                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos"  value=" {{ $admin->apellidos }} ">
                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="emails" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value=" {{ $admin->email }} ">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12" align="center">
                        <button type="submit" class="btn btn-dark waves-effect waves-light mr-1">
                                Guardar
                            </button>

                            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary waves-effect waves-light">
                            Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
            &nbsp;
    </div>
</div>
@endsection