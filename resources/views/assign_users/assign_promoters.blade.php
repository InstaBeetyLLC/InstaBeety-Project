@extends('adminLayout')

@section('content')


    @include('error')
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="row">
            <div class="col-md-12">


                <form method="post" id="assign_promoter_form"
                      action="{!! route('promoter.assign') !!}">
                    {{csrf_field()}}

                    {{--<div class="form-group @if($errors->has('city')) has-error @endif">--}}
                        {{--cities select--}}
                        {{--<label for="city">Select City</label>--}}
                        {{--<select name="city" id="city" class="form-control">--}}
                            {{--<option value="" selected>--Select City--</option>--}}
                                {{--@foreach($cities as $city)--}}
                                    {{--<option value="{{$city->id}}">{{$city->name}}</option>--}}
                                {{--@endforeach--}}
                        {{--</select>--}}
                        {{--@if($errors->has("city"))--}}
                            {{--<span class="help-block">{{ $errors->first("city") }}</span>--}}
                        {{--@endif--}}

                    {{--</div>--}}


                    <div class="form-group @if($errors->has('store')) has-error @endif">
                        {{--cities select--}}
                        <label for="store">Select store</label>
                        <select name="store" id="store" class="form-control">
                            <option selected disabled>Select store</option>
                            @role(('admin'))
                            @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->name}}</option>
                            @endforeach

                            @endrole
                            @role(('manager'))
                            @foreach($accountsManger as $item)
                                <option value="{{$item->account->store->id}}">{{$item->account->store->name}}</option>
                            @endforeach

                            @endrole

                        </select>
                        @if($errors->has("store"))
                            <span class="help-block">{{ $errors->first("store") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('account')) has-error @endif">
                        {{--cities select--}}
                        <label for="account">Select account</label>
                        <select name="account" id="account" class="form-control">
                            <option value="" disabled selected>Select account</option>
                        </select>
                        @if($errors->has("account"))
                            <span class="help-block">{{ $errors->first("account") }}</span>
                        @endif
                    </div>


                    <div class="form-group @if($errors->has('product')) has-error @endif">
                        {{--cities select--}}
                        <label for="promoter">Select Product</label>
                    @foreach($products as $product)
                                <label class='checkbox-inline'><input type='checkbox' name='product[]'
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
                                                                  value='{{$status->id}}'>{{$status->name}}</label>
                        @endforeach
                        @if($errors->has("product_status"))
                            <span class="help-block">{{ $errors->first("product_status") }}</span>
                        @endif
                    </div>


                    @role(('admin'))
                    <div class="form-group @if($errors->has('promoter')) has-error @endif">
                        {{--promoters select--}}
                        <label for="promoter">Select Supervisor</label>
                        <select name="manager" id="manager" class="form-control">
                            <option value="" selected>--Select Supervisor--</option>
                            @foreach($managers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has("manager"))
                            <span class="help-block">{{ $errors->first("manager") }}</span>
                        @endif

                    </div>
                    @endrole



                    <div class="form-group @if($errors->has('promoter')) has-error @endif">
                        {{--promoters select--}}
                        <label for="promoter">Select Promoter</label>
                        <select name="promoter" id="promoter" class="form-control">
                            <option value="" selected>--Select Promoter--</option>
                            @if(isset($promoters) && !empty($promoters))
                                @foreach($promoters as $promoter)
                                    <option value="{{$promoter->id}}">{{$promoter->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has("promoter"))
                            <span class="help-block">{{ $errors->first("promoter") }}</span>
                        @endif

                    </div>
                    {{--end promoters select--}}


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
            $('#store').change(function () {
                if ($(this).val() != '') {
                    $('#account').html('');
                    $.getJSON('/getRolesAccounts?id=' + $('#store').val(), function (data) {
                        $('#account').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });
                }
            });




        });
    </script>
@endsection