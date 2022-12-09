@extends('layouts.admin')

@section('template_title')
    {{ $categoria->name ?? 'Show Categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Vista de usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->name }} <br>
                            <strong>Correo:</strong>
                            {{ $user->email }} <br>
                            <strong>rol:</strong>
                            {{ $user->role}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.bloder')