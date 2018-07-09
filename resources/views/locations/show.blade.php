@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>Locations / Show #{{$location->id}}</h1>
        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('locations.edit', $location->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$location->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="city_id">CITY</label>
                     <p class="form-control-static">{{$location->city->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('locations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
            <a class="btn btn-link" href="{{ route('locations.edit', $location->id) }}"> Edit <i
                        class="glyphicon glyphicon-forward"></i> </a>


            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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