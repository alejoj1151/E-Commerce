@extends('layouts.app')

@section('title', 'No autorizado')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $exception->getMessage() }}</h2>
        </div>
    </div>
@endsection