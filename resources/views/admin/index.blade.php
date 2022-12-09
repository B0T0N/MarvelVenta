<link rel="stylesheet" href="{{ asset('css/style4.css') }}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

@extends('layouts.admin')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="table_header">
                    <h2>Usuarios</h2>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif


                    </div>

                    <br>

                    <div class="barra">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Correo <i class="far fa-chevron-double-down"></i></th>
                                <th>Rol <i class="fas fa-usd-circle"></i></th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                            <tbody class="barra">
                                @foreach ($users as $producto )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $producto->name }}</td>
                                    <td>{{ $producto->email }}</td>
                                    <td>{{ $producto->role }}</td>
                                    <td>
                                        <form action="{{ route('admin.destroy',$producto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('admin.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('admin.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estas seguro de Eliminar la Cuenta?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Baneo</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                    </table>
                    </div>
                </div>
    </div>
@endsection

@extends('layouts.bloder')