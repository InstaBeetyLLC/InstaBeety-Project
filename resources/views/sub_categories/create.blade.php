@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('sub_categories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                    <label for="name-field">Category</label>

                    <select class="form-control m-b" name="category_id" id="category">
                        <option value="" selected>--Select category--</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("category_id"))
                        <span class="help-block">{{ $errors->first("category_id") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>





                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
