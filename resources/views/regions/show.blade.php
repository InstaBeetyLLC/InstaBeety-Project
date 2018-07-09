@extends('adminLayout')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

                <form action="#">
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <p class="form-control-static">{{$region->name}}</p>
                    </div>
                </form>

                <a class="btn btn-link" href="{{ route('regions.index') }}"><i class="glyphicon glyphicon-backward"></i>
                    Back</a>
                <a class="btn btn-link" href="{{ route('regions.edit', $region->id) }}"> Edit <i
                            class="glyphicon glyphicon-forward"></i> </a>

                <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display: inline;"
                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection