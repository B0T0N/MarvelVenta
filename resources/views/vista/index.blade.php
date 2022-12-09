<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <br>
    <div class="container">
        <div class="row">
            <h1></h1>
            @foreach ($vistas as $vista )
            <div class="col-md-3" style="text-align: center;">
                <div class="card" style="width: 18rem; ">
                    <img class="card-img-top" style="width: 120px; height: 200px; margin: auto;" alt="..." src="{{ asset('storage').'/'.$vista->imagen }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$vista->nombre}}</h5>
                        <a href="{{ route('vistas.show',$vista->id) }}" class="btn btn-primary">Tradear</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @endsection

    @extends('layouts.fooder')
</body>
</html>