@extends('adminLayout')
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$user->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$user->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$user->email}}</p>
                </div>
                    <div class="form-group">
                     <label for="password">PASSWORD</label>
                     <p class="form-control-static">{{$user->current_password}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone_number">PHONE_NUMBER</label>
                     <p class="form-control-static">{{$user->phone_number}}</p>
                </div>
                    <div class="form-group">
                     <label for="job_title">JOB_TITLE</label>
                     <p class="form-control-static">{{$user->job_title}}</p>
                </div>
                    <div class="form-group">
                     <label for="day_off">DAY_OFF</label>
                     <p class="form-control-static">{{$user->day_off}}</p>
                </div>
                    <div class="form-group">
                     <label for="section">SECTION</label>
                     <p class="form-control-static">{{$user->section}}</p>
                </div>

                   @if(isset($user->nationality_id))
                    <div class="form-group">
                        <label for="nationality_id">nationality</label>
                        <p class="form-control-static">{{$user->nationality->name}}</p>
                    </div>
                  @endif


                @if(isset($user->photo))
                    <div class="form-group">
                        <label for="photo">PHOTO</label>
                        <img alt="image" class="img-circle" src="{!! route('imager',['size'=>'100*100','image'=>$user->photo])!!}" />

                    </div>
                @endif

                    <div class="form-group">
                     <label for="active">ACTIVE</label>
                     <p class="form-control-static">
                            @if($user->active==1)
                                yes
                            @else
                                no
                            @endif
                        </p>
                </div>
                @if(isset($user->userRole) &&isset($user->userRole[0]) )
                    <div class="form-group">
                        <label for="role_id">ROLE</label>
                        <p class="form-control-static">
                            {{$user->userRole[0]->name}}
                        </p>
                    </div>

                @endif
            </form>

            <a class="btn btn-link" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
            <a class="btn btn-link" href="{{ route('users.edit', $user->id) }}"> Edit <i
                        class="glyphicon glyphicon-forward"></i> </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;"
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