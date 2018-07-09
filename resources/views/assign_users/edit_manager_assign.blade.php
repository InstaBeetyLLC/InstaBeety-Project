@extends('adminLayout')
@section('content')
    @include('error')

    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">

                <h2>Edit Manager Assign</h2>
                <?php
                $region_name = NULL;
                $city_name = NULL;
                $manager_name = NULL;

                if (isset($city_id) && $city_id != null) {
                    $city_name = \App\HelperFunctions\Helper::getCityName($city_id);
                }
                if (isset($region_id) && $region_id != null) {
                    $region_name = \App\HelperFunctions\Helper::getCityName($region_id);
                }
                if (isset($manager_id) && $manager_id != null) {
                    $manager_name = \App\HelperFunctions\Helper::getCityName($manager_id);
                }
                ?>

                    <form action="{{ route('EditManagerAssign') }}" method="POST">

                    {{csrf_field()}}
                    <div class="form-group  @if($errors->has('region')) has-error @endif">
                        <label for="region">Select Region</label>
                        <select required name="region" id="region" class="form-control">
                            <option value="0">--Select Region--</option>
                            @if(isset($regions) && !empty($regions))
                                @foreach($regions as $k=>$v)
                                    @if($k == $region_id)
                                        <option value="{{$k}}" selected>{{$v}}</option>
                                    @else
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("region"))
                            <span class="help-block">{{ $errors->first("region") }}</span>
                        @endif

                    </div>

                    <div class="form-group @if($errors->has('city')) has-error @endif" id="region-cities">
                        <label for="city">Select City</label>
                        <select required name="city" id="city" class="form-control">
                            <option value="0">--Select City--</option>
                            @if(isset($cities) && !empty($cities))
                                @foreach($cities as $k=>$v)
                                    @if($k == $city_id)
                                        <option value="{{$k}}" selected>{{$v}}</option>
                                    @else
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("city"))
                            <span class="help-block">{{ $errors->first("city") }}</span>
                        @endif

                    </div>

                    <div class="form-group @if($errors->has('manager')) has-error @endif">
                        <label for="manager">Select Manager</label>
                        <select required name="manager" id="manager" class="form-control">
                            <option value="0" selected>--Select Manager--</option>
                            @if(isset($managers) && !empty($managers))
                                @foreach($managers as $k=>$v)
                                    @if($k == $manager_id)
                                        <option value="{{$k}}" selected>{{$v}}</option>
                                    @else
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("manager"))
                            <span class="help-block">{{ $errors->first("manager") }}</span>
                        @endif

                    </div>

                    <hr>
                    @if(isset($manager_city_id) && $manager_city_id!=null)
                        <input type="hidden" name="manager_city_id" value="{{$manager_city_id}}">
                    @endif

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a class="btn btn-link pull-right" href="{{ route('viewManagerCities') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        $("#region").change(function () {
            var region_id = $(this).val();
            var base_url = {!! json_encode(url('/')) !!};

            $.ajax({
                type: "Get",
                url: base_url + "/get_region_cities",
                data: {region_id: region_id, is_edit: 1},
                success: function (result) {
                    if (!result) {
                        $("#region-cities").empty();
                        console.log('No cities!');
                    }
                    else {
                        console.log(result);
                        $("#city").empty();
                        $("#city").append(result);
                    }
                }
            });
        });
        });
    </script>
@endsection