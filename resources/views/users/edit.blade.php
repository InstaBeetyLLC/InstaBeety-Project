@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $user->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ is_null(old("email")) ? $user->email : old("email") }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('current_password')) has-error @endif">
                       <label for="password-field">Password</label>
                    <input type="text" id="password-field" name="old_password" class="form-control"
                           value="{{ is_null(old("current_password")) ? $user->current_password : old("current_password") }}" readonly/>
                       @if($errors->has("current_password"))
                        <span class="help-block">{{ $errors->first("current_password") }}</span>
                       @endif
                        <a id="changePasswordBtn">change Password</a>
                    </div>


                    <div class="changePasswordDiv form-group @if($errors->has('password')) has-error @endif" style="display: none">
                       <label for="password-field">New Password</label>
                    <input type="text" id="password-field" name="password" class="form-control" />
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>





                    <div class="form-group @if($errors->has('phone_number')) has-error @endif">
                       <label for="phone_number-field">Phone_number</label>
                    <input type="text" id="phone_number-field" name="phone_number" class="form-control" value="{{ is_null(old("phone_number")) ? $user->phone_number : old("phone_number") }}"/>
                       @if($errors->has("phone_number"))
                        <span class="help-block">{{ $errors->first("phone_number") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('job_title')) has-error @endif">
                       <label for="job_title-field">Job_title</label>
                    <input type="text" id="job_title-field" name="job_title" class="form-control" value="{{ is_null(old("job_title")) ? $user->job_title : old("job_title") }}"/>
                       @if($errors->has("job_title"))
                        <span class="help-block">{{ $errors->first("job_title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('day_off')) has-error @endif">
                       <label for="day_off-field">Day_off</label>
                    <input type="text" id="day_off-field" name="day_off" class="form-control" value="{{ is_null(old("day_off")) ? $user->day_off : old("day_off") }}"/>
                       @if($errors->has("day_off"))
                        <span class="help-block">{{ $errors->first("day_off") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('section')) has-error @endif">
                       <label for="section-field">Section</label>
                    <input type="text" id="section-field" name="section" class="form-control" value="{{ is_null(old("section")) ? $user->section : old("section") }}"/>
                       @if($errors->has("section"))
                        <span class="help-block">{{ $errors->first("section") }}</span>
                       @endif
                    </div>


                <div class="form-group @if($errors->has('nationality_id')) has-error @endif">
                    <label for="nationality_id-field">Nationality</label>
                    <select class="form-control m-b" name="nationality_id" id="nationality_id">
                        <option value="" selected>--Select nationality--</option>
                        @foreach($nationalities as $nationality)
                            @if($nationality->id ==$user->nationality_id)
                                <option value="{{$nationality->id}}" selected>{{$nationality->name}}</option>
                                @else
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endif
                        @endforeach
                    </select>


                    @if($errors->has("nationality_id"))
                        <span class="help-block">{{ $errors->first("nationality_id") }}</span>
                    @endif
                </div>



                 <div class="form-group @if($errors->has('photo')) has-error @endif">
                    <label for="photo-field">Photo</label>
                        <img alt="image" class="img-circle" src="{!! route('imager',['size'=>'100*100','image'=>$user->photo])!!}" />

                    <input type="file" id="photo-field" name="photo" class="form-control" />

                    @if($errors->has("photo"))
                        <span class="help-block">{{ $errors->first("photo") }}</span>
                    @endif
                </div>


                <div class="form-group @if($errors->has('active')) has-error @endif">
                    <label for="active-field">Active</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($user->active)active @endif">
                            <input type="radio"
                                   value="1"
                                   name="active"
                                   id="active"
                                   autocomplete="off">
                            True</label><label class="btn btn-primary @if(!$user->active)active @endif"><input type="radio"
                                                                                     name="active"
                                                                                     value="0" id="active"
                                                                                     autocomplete="off">
                            False</label></div>
                    @if($errors->has("active"))
                        <span class="help-block">{{ $errors->first("active") }}</span>
                    @endif
                </div>



                <div class="form-group @if($errors->has('role_id')) has-error @endif">
                    <label for="role_id-field">Role_id</label>
                    <select class="form-control m-b" name="role_id" id="role_id">
                        <option value="" selected>--Select nationality--</option>
                        @foreach($roles as $role)
                            @if(isset($user->userRole[0]) && $role->id==$user->userRole[0]->id)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has("role_id"))
                        <span class="help-block">{{ $errors->first("role_id") }}</span>
                    @endif
                </div>



                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {

            $('#changePasswordBtn').click(function () {
                $('.changePasswordDiv').show();

            })

        });
    </script>
@endsection

