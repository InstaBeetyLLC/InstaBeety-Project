
@extends('adminLayout')

@section('content')

    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

                <form action="#">
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <p class="form-control-static">{{$item->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Active</label>
                        <p class="form-control-static">                                            @if($item->active)
                                yes
                            @else
                                no
                            @endif
                        </p>
                    </div>
                </form>

                <a class="btn btn-link" href="{{ route('items.index') }}"><i class="glyphicon glyphicon-backward"></i>
                    Back</a>
                <a class="btn btn-link" href="{{ route('items.edit', $item->id) }}"> Edit <i
                            class="glyphicon glyphicon-forward"></i> </a>

            </div>
        </div>
    </div>

@endsection