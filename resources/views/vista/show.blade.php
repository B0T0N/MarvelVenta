@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vistas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $vista->categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $vista->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $vista->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong><br>
                            <img width="150px"  src="{{ asset('storage').'/'.$vista->imagen }}" alt="">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ route('vistas.store') }}" method="post">
                    @csrf
                    <label for="">Comenta</label>
                    <textarea name="comentario" required id="comentario" cols="90" rows="5"></textarea>
                    <input type="hidden" name="producto_id" value="{{ $vista->id }}">
                    <input class="btn btn-primary" type="submit" value="Comentar">
                </form>

                <br><br>
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($compras as $compro)
                        <tr>
                            <td>Desconocido</td>
                            <td>{{ $compro->producto->nombre }}</td>
                            <td>{{ $compro->comentario }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
