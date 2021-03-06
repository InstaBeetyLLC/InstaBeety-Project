@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $account->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>


                <div class="form-group @if($errors->has('store_id')) has-error @endif">
                    <label for="brand_id-field">Store Name</label>
                    <select class="form-control m-b" name="store_id" id="store_id">
                        @foreach($stores as $store)
                            @if($store->id ==$account->store_id)
                                <option value="{{$store->id}}" selected>{{$store->name}}</option>
                            @else
                                <option value="{{$store->id}}">{{$store->name}}</option>
                            @endif

                        @endforeach
                    </select>
                    @if($errors->has("store_id"))
                        <span class="help-block">{{ $errors->first("store_id") }}</span>
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('accounts.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div></div>
@endsection
