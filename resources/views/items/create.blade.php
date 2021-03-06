@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

            <form action="{{ route('items.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>


                <div class="form-group @if($errors->has('active')) has-error @endif">
                    <label for="active-field">Active</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" value="1" name="active" id="active-field"
                                   autocomplete="off" checked> True</label>

                        <label class="btn btn-primary ">
                            <input type="radio" name="active" value="0" id="active-field"
                                   autocomplete="off"> False</label></div>

                    @if($errors->has("active"))
                        <span class="help-block">{{ $errors->first("active") }}</span>
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('items.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

            </div>
        </div>
    </div>
@endsection
