@extends('layouts.app')

@section('template_title')
    {{ $propiedade->name ?? 'Show Propiedade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Propiedades</span>
                        </div>
                        <div class="float-right">
                            @if (!Auth::check())
                                <a class="btn btn-primary" href="{{ route('index2') }}"> Atras</a>
                            @endif
                            @if (Auth::check())
                                <a class="btn btn-primary" href="{{ route('propiedades.index') }}"> Atras</a>
                            @endif
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        @if ($propiedade->fotos->foto != "")
                            <img src="{{ asset($propiedade->fotos->foto) }}" class="card-img-top" alt="...">
                        @endif
                        @if ($propiedade->fotos->foto == "")
                            <img src="http://127.0.0.1:8000/imagen/fotos/contenido-no-disponible.jpg" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $propiedade->categoria->categoria }}</h5>

                            <div class="form-group">
                                <strong>Precio Uf:</strong>
                                {{ $propiedade->precio_uf }}
                            </div>
                            <div class="form-group">
                                <strong>Contacto:</strong>
                                {{ $propiedade->contacto }}
                            </div>
                            <div class="form-group">
                                <strong>Telefono:</strong>
                                {{ $propiedade->telefono }}
                            </div>
                            <div class="form-group">
                                <strong>Direccion:</strong>
                                {{ $propiedade->direccion }}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                {{ $propiedade->descripcion }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
