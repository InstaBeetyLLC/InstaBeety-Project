@extends('adminLayout')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$product_share->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$product_share->name}}</p>
                </div>
                    @if(isset($product_share->store_id))
                    <div class="form-group">
                        <label for="brand_id">Store</label>
                        <p class="form-control-static">{{$product_share->store->name}}</p>
                    </div>
                @endif


                    <div class="form-group">
                     <label for="brand_id">BRAND</label>
                     <p class="form-control-static">{{$product_share->brand_id}}</p>
                      </div>


                    <div class="form-group">
                     <label for="quantity">QUANTITY</label>
                     <p class="form-control-static">{{$product_share->quantity}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('product_shares.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
            <a class="btn btn-link" href="{{ route('product_shares.edit', $product_share->id) }}"> Edit <i class="glyphicon glyphicon-forward"></i> </a>


            <form action="{{ route('product_shares.destroy', $product_share->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>

        </div>
    </div>
    </div>

@endsection