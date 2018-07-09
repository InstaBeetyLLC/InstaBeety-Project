@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">


            <form action="{{ route('models.update', $model->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('item_id')) has-error @endif">
                    <select class="form-control m-b" name="item_id" id="item_id">
                        @foreach($items as $item)
                            @if($item->id ==$model->item_id)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>


                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $model->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('models.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
