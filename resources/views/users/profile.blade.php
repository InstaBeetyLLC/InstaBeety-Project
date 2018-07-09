@extends('adminLayout')

@section('content')
    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('users.updateProfile') }}" method="POST" enctype='multipart/form-data'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('name')) has-error @endif">
                        <label for="name-field">Name</label>
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $user->name : old("name") }}"/>
                        @if($errors->has("name"))
                            <span class="help-block">{{ $errors->first("name") }}</span>
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
                        <label for="phone_number-field">Phone Number</label>
                        <input type="text" id="phone_number-field" name="phone_number" class="form-control" value="{{ is_null(old("phone_number")) ? $user->phone_number : old("phone_number") }}"/>
                        @if($errors->has("phone_number"))
                            <span class="help-block">{{ $errors->first("phone_number") }}</span>
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

