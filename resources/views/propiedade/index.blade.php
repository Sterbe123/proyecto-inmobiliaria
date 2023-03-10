@extends('layouts.app')

@section('template_title')
    Propiedades
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Mis Propiedades
                            </span>
                             <div class="float-right">
                                <a href="{{ route('propiedades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear Nueva Propiedad
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Precio Uf</th>
										<th>Contacto</th>
										<th>Telefono</th>
										<th>Direccion</th>
										<th>Descripcion</th>
										<th>Categoria</th>
                                        <th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($propiedades as $propiedade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $propiedade->precio_uf }}</td>
											<td>{{ $propiedade->contacto }}</td>
											<td>{{ $propiedade->telefono }}</td>
											<td>{{ $propiedade->direccion }}</td>
											<td>{{ $propiedade->descripcion }}</td>
											<td>{{ $propiedade->categoria->categoria }}</td>
                                            @if ($propiedade->fotos->foto == "")
                                                <td><img src="http://127.0.0.1:8000/imagen/fotos/contenido-no-disponible.jpg" width="50" height="50"></td> 
                                            @endif
                                            @if ($propiedade->fotos->foto != "")
                                                <td><img src="{{asset($propiedade->fotos->foto)}}" width="50" height="50"></td>
                                            @endif
                                            <td>
                                                <form action="{{ route('propiedades.destroy',$propiedade->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('propiedades.show',$propiedade->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('propiedades.edit',$propiedade->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $propiedades->links() !!}
            </div>
        </div>
    </div>
@endsection
