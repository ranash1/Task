@extends('layouts.master')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>

        </style>
    </head>
    <body style="background-color:  #045263;">
        @section('content')
            @include('includes.message-block')
            <form method="post" class="form-horizontal" action="{{route('create')}}" id="form">
                    @csrf
                    <div class="form-group" style="margin-top:40px;">
                        <h4>  Add New Product </h4>
                       <input class="form-control" name="name"  id="name" placeholder="Product Name"></input>
                    </div>
                    <div class="form-group" style="margin-top:40px;">
                       <input class="form-control" name="quantity"  id="quantity" placeholder="Quantity in stock"></input>
                    </div>
                    <div class="form-group" style="margin-top:40px;">
                       <input class="form-control" name="price"  id="price" placeholder="Price per item"></input>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" >Create Product</button>
                   <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
            <div style=" background-color:#deefef">
             <h4>  Categories </h4>
                <div id="categories-table" class="table-responsive" >
                    <table class="table" data-toggle="dataTable" data-form="categoryForm">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        @if(count($products)>0)
                            @foreach($products as $pro)
                                <tr>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->quantity}}</td>
                                    <td>{{$pro->price}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    </div>
                    <h3 style="margin-left : 800px;"> Total price is    {{$total}} $ </h3>
        @endsection
    </body>
</html>
