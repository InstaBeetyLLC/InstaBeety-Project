@extends('adminLayout')
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Cities / Edit #{{$city->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('cities.update', $city->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $city->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('region_id')) has-error @endif">
                       <label for="region_id-field">Region_id</label>
                        <select class="form-control m-b" name="region_id" id="region_id">
                            @foreach($regions as $region)
                                @if($region->id ==$city->region_id)
                                    <option value="{{$region->id}}" selected>{{$region->name}}</option>
                                @else
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endif

                            @endforeach
                        </select>
                       @if($errors->has("region_id"))
                        <span class="help-block">{{ $errors->first("region_id") }}</span>
                       @endif
                    </div>



                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('cities.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
