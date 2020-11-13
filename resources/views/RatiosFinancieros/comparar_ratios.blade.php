@extends('layouts.app')

@section('content')

@foreach($empresas as $empresa)
    <p>{{$empresa->nombre_empresa}}</p>
@endforeach



@endsection