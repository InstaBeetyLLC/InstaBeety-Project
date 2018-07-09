@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('locations.update', $location->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $location->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>


                    <div class="form-group @if($errors->has('city_id')) has-error @endif">
                       <label for="city_id-field">City_id</label>
                        <select class="form-control m-b" name="city_id" id="city_id">
                            @foreach($cities as $city)
                                @if($location->id ==$city->id)
                                    <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endif

                            @endforeach
                        </select>
                       @if($errors->has("city_id"))
                        <span class="help-block">{{ $errors->first("city_id") }}</span>
                       @endif
                    </div>



                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('locations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
