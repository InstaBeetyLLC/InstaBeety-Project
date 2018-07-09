@extends('adminLayout')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$sub_category->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="category_id">CATEGORY</label>
                     <p class="form-control-static">{{$sub_category->category->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
            <a class="btn btn-link" href="{{ route('sub_categories.edit', $sub_category->id) }}"> Edit <i class="glyphicon glyphicon-forward"></i> </a>
            <form action="{{ route('sub_categories.destroy', $sub_category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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