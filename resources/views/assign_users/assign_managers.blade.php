@extends('adminLayout')

@section('content')
    @include('error')

    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

                <form method="post" id="assign_manager_form"
                      action="{!! action('AssignManagerController@submit_manager_assign') !!}">
                    {{csrf_field()}}


                    <div class="form-group @if($errors->has('region')) has-error @endif">

                        <label for="region">Select Region</label>

                        <select name="region" id="region" class="form-control">
                            <option value="" selected>--Select Region--</option>
                            @if(isset($regions) && !empty($regions))
                                @foreach($regions as $k=>$v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("region"))
                            <span class="help-block">{{ $errors->first("region") }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('cities')) has-error @endif">

                        <label for="cities">Select city</label>

                        <select name="cities" id="cities" class="form-control">
                            <option value="" selected>--Select city--</option>
                        </select>
                        @if($errors->has("cities"))
                            <span class="help-block">{{ $errors->first("cities") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('stores')) has-error @endif">

                        <div id="stores" style="display: none">
                            <label for="stores">Select store</label>
                        </div>

                        @if($errors->has("stores"))
                            <span class="help-block">{{ $errors->first("stores") }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('accounts')) has-error @endif">

                        <div id="accounts" style="display: none">
                            <label for="accounts">Choose accounts</label>
                        </div>

                        @if($errors->has("stores"))
                            <span class="help-block">{{ $errors->first("stores") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('manager')) has-error @endif">

                        <label for="manager">Select Supervisor</label>

                        <select name="manager" id="manager" class="form-control">
                            <option value="" selected>--Select Supervisor--</option>
                            @if(isset($managers) && !empty($managers))
                                @foreach($managers as $k=>$v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("manager"))
                            <span class="help-block">{{ $errors->first("manager") }}</span>
                        @endif

                    </div>


                    <hr>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-link pull-right" href="{{ url()->previous() }}"><i
                                    class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <!-- define your scripts here -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".breadcrumb").append("<li><strong><a href='{{URL::action('AssignManagerController@assign_manager')}}'>Assign Manager</a></strong></li>")

            $(".success").delay(1500).slideUp(300);
        });

        //on change to load sub categories
        $('#region').change(function () {
            if ($(this).val() != '') {
                $.getJSON('/getRegionCities?id=' + $('#region').val(), function (data) {
                    $('#cities').html($.map(data, function (item, index) {
                        return '<option value=' + item.id + '>' + item.name + '</option>'
                    }));
                    $('#cities').append('<option selected disabled>select City</option>');

                });
            }
        });

        var base_url = {!! json_encode(url('/')) !!};
        $('#cities').change(function () {
            $('#stores').show();
            if ($(this).val() != '') {
                $.ajax({
                    type: "Get",
                    url: base_url + "/getStoresAsCheckBoxes",
                    data: {id: $('#cities').val()},
                    success: function (result) {
                        $('#stores').append(result);
                    }
                });
            }
        });

        function getAccounts(id){
            $('#accounts').show();
                $.ajax({
                    type: "Get",
                    url: base_url + "/getStoreAccounts",
                    data: {id: id},
                    success: function (result) {
                        $('#accounts').append(result);
                    }
                });
        }

    </script>
@endsection