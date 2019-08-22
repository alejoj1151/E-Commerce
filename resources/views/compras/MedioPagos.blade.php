@extends('layouts.app')

@section('title', 'Comprar productos')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
            <h1>Medio de pago</h1>
        </div>
        <div class="row justify-content-center">
            @if(session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row justify-content-center">
            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6"> </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>
                            <em>Resumen de la compra</em>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre del producto</th>
                                <th>Cantidad</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carritos as $producto)
                            <tr>
                                <td class="col-md-9"><em>{{$producto->nombre}}</em></h4></td>
                                <td class="col-md-1" style="text-align: center">{{number_format($producto->cantidad)}}</td>
                                <td class="col-md-1 text-center">{{number_format($producto->precio, 0, '.', ',')}}</td>
                                <td class="col-md-1 text-center">{{number_format($producto->cantidad*$producto->precio, 0, '.', ',')}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">
                                <p>
                                    <strong>Subtotal: </strong>
                                </p>
                                <p>
                                    <strong>Impuesto: </strong>
                                </p></td>
                                <td class="text-center">
                                <p>
                                    <strong>${{number_format($total)}}</strong>
                                </p>
                                <p>
                                    <strong>$0.0</strong>
                                </p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong>${{number_format($total)}}</strong></h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form class="form-group" method="POST" action="/pago" enctype="multipart/form-data">
            @csrf
            <div class="paymentCont">
                <div class="headingWrap">
                    <p class="text-center">Selecciona el medio de pago que deseas usar</p>
                </div>
                @error('medio_pago')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="paymentWrap">
                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                        <label class="btn paymentMethod active">
                            <div class="method visa"></div>
                            <input type="radio" name="medio_pago" value="visa" checked> 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method master-card"></div>
                            <input type="radio" name="medio_pago" value="master_card" > 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method amex"></div>
                            <input type="radio" name="medio_pago" value="efecty" >
                        </label>
                         <label class="btn paymentMethod">
                             <div class="method vishwa"></div>
                            <input type="radio" name="medio_pago" value="paypal" > 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method ez-cash"></div>
                            <input type="radio" name="medio_pago" value="baloto" > 
                        </label>
                    </div>        
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success text-center" href="#">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    @endsection

