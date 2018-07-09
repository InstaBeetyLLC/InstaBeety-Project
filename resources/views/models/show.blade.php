@extends('adminLayout')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">
            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$model->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">Name</label>
                     <p class="form-control-static">{{$model->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="item_id">Item</label>
                     <p class="form-control-static">{{$model->item->name}}</p>
                </div>
            </form>
            <a class="btn btn-link" href="{{ route('models.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

            </div>
        </div>
    </div>

@endsection