@extends('adminLayout')

@section('content')


    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">
                <form method="post" id="assign_promoter_form"
                      action="{!! route('assignedPromoters.update') !!}">
                    {{csrf_field()}}

                    <div class="form-group @if($errors->has('city')) has-error @endif">
                        {{--cities select--}}
                        <label for="city">Select City</label>
                        <select name="city" id="city" class="form-control">
                            <option value="" selected>--Select City--</option>
                            @foreach($cities as $city)
                                @if($city->id==$assigned_promoter->account->store->city->id)
                                    <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has("city"))
                            <span class="help-block">{{ $errors->first("city") }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('store')) has-error @endif">
                        {{--cities select--}}
                        <label for="store">Select store</label>
                        <select name="store" id="store" class="form-control">
                            @foreach($stores as $store)
                                @if($store->id==$assigned_promoter->account->store->id)
                                    <option value="{{$store->id}}" selected>{{$store->name}}</option>
                                @else
                                    <option value="{{$store->id}}">{{$store->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has("store"))
                            <span class="help-block">{{ $errors->first("store") }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('account')) has-error @endif">
                        {{--cities select--}}
                        <label for="store">Select account</label>
                        <select name="account" id="account" class="form-control">
                            @foreach($accounts as $account)
                                @if($account->id==$assigned_promoter->account->id)
                                    <option value="{{$account->id}}" selected>{{$account->name}}</option>
                                @else
                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has("account"))
                            <span class="help-block">{{ $errors->first("account") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('product')) has-error @endif">
                        {{--cities select--}}
                        <label for="promoter">Select Product</label>$allowedProducts
                        @foreach($products as $product)
                            <label class='checkbox-inline'><input type='checkbox' name='product[]'
                                                                  @if(in_array($product->id,$allowedProducts)) checked @endif
                                                                  value='{{$product->id}}'>{{$product->name}}</label>
                        @endforeach
                        @if($errors->has("product"))
                            <span class="help-block">{{ $errors->first("product") }}</span>
                        @endif
                    </div>



                    <div class="form-group @if($errors->has('product_status')) has-error @endif">
                        {{--cities select--}}
                        <label for="promoter">Reports  </label>
                        @foreach($productStatuses as $status)
                            <label class='checkbox-inline'><input type='checkbox' name='status[]'
                                                                  @if(in_array($status->id,$allowedReports)) checked @endif
                                                                  value='{{$status->id}}'>{{$status->name}}</label>
                        @endforeach
                        @if($errors->has("product_status"))
                            <span class="help-block">{{ $errors->first("product_status") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('promoter')) has-error @endif">
                        {{--promoters select--}}
                        <label for="promoter">Select Promoter</label>
                        <select name="promoter" id="promoter" class="form-control">
                            <option value="" selected>--Select Promoter--</option>
                                @foreach($promoters as $promoter)
                                    @if($promoter->id==$assigned_promoter->promoter_id)
                                        <option value="{{$promoter->id}}" selected>{{$promoter->name}}</option>
                                    @else
                                        <option value="{{$promoter->id}}">{{$promoter->name}}</option>
                                    @endif
                                @endforeach
                        </select>
                        @if($errors->has("promoter"))
                            <span class="help-block">{{ $errors->first("promoter") }}</span>
                        @endif

                    </div>



                    @role(('admin'))
                    <div class="form-group @if($errors->has('manager')) has-error @endif">
                        {{--promoters select--}}
                        <label for="promoter">Select Supervisor</label>
                        <select name="manager" id="manager" class="form-control">
                            <option value="" selected>--Select Supervisor--</option>
                            @foreach($managers as $manager)
                                @if($manager->id==$assigned_promoter->manager_id)
                                    <option value="{{$manager->id}}" selected>{{$manager->name}}</option>

                                @else
                                    <option value="{{$manager->id}}">{{$manager->name}}</option>

                                @endif
                            @endforeach
                        </select>
                        @if($errors->has("manager"))
                            <span class="help-block">{{ $errors->first("manager") }}</span>
                        @endif

                    </div>
                    @endrole




                    {{--end promoters select--}}

                    <input type="hidden" name="id" value="{{$assigned_promoter->id}}">
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-link pull-right" href="{{ route('viewPromotersStores') }}"><i
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
            //listen when  city changes to load stores
            $('#city').change(function () {
                if ($(this).val() != '') {
                    $('#store').html('');
                    $.getJSON('/get_city_stores?city_id=' + $('#city').val(), function (data) {
                        $('#store').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });
                    setTimeout(
                            function () {
                                $('#account').html('');
                                $.getJSON('/get_store_accounts?store_id=' + $('#store').val(), function (data) {
                                    $('#account').html($.map(data, function (item, index) {
                                        return '<option value=' + item.id + '>' + item.name + '</option>'
                                    }));
                                });
                            },
                            320);
                }
            });

            //listen when store changed to load accounts

            $('#store').change(function () {
                if ($(this).val() != '') {
                    $('#account').html('');
                    $.getJSON('/get_store_accounts?store_id=' + $('#store').val(), function (data) {
                        $('#account').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });
                }
            });

        });
    </script>
@endsection