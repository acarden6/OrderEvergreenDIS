@extends('layouts.master') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Registar pedido de entrega</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="post" action="{{ route('order.save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Producto</label>
                            <select name="product" id="product" class="form-control">
                                <option disable selected>Seleccione producto</option>
                                @foreach($products as $item)
                                    <option value="{{ $item->name }}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Cliente</label>
                            {{-- <input type="text" id="user" name="user" class="form-control"> --}}

                            <select name="client" id="client" class="form-control">
                                <option disable selected>Seleccione su nombre</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->_id }}">{{ $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="quantity">Cantidad (Kg):</label>
                                <input type="number" id="quantity" name="quantity" min="0" class="form-control">
                            </div>
                            <div class="col">
                                <label for="date">Fecha estimada de entrega</label>
                                <input type="date" id="date" name="exit_date" min="2022-03-28" class="form-control">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
