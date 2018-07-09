@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('sub_categories.update', $sub_category->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $sub_category->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                <select class="form-control m-b" name="category_id" id="category">
                    @foreach($categories as $category)
                        @if($category->id ==$sub_category->category_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif

                     @endforeach
                </select>

                    </div>



                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>

            </form>

        </div>
    </div>
    </div>
@endsection
