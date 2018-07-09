@extends('adminLayout')
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> ProductShares / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('product_shares.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>

                <div class="form-group @if($errors->has('store_id')) has-error @endif">
                       <label for="brand_id-field">Stor</label>
                    <select class="form-control m-b" name="store_id" id="store_id">

                        <option value="" selected>--Select Store--</option>

                    @foreach($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                       @if($errors->has("store_id"))
                        <span class="help-block">{{ $errors->first("store_id") }}</span>
                       @endif
                    </div>


                <div class="form-group @if($errors->has('brand_id')) has-error @endif">
                       <label for="brand_id-field">Brand</label>
                    <select class="form-control m-b" name="brand_id" id="brand">

                        <option value="" selected>--Select brand--</option>

                    @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                       @if($errors->has("brand_id"))
                        <span class="help-block">{{ $errors->first("brand_id") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('quantity')) has-error @endif">
                       <label for="quantity-field">Quantity</label>
                    <input type="text" id="quantity-field" name="quantity" class="form-control" value="{{ old("quantity") }}"/>
                       @if($errors->has("quantity"))
                        <span class="help-block">{{ $errors->first("quantity") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('product_shares.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
