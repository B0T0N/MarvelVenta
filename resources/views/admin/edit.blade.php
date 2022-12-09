@extends('layouts.admin')

@section('template_title')
    Update Categoria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Categoria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.bloder')
