@extends('adminLayout')


@section('css')
    <link href="{!! URL::asset('css/plugins/c3/c3.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/plugins/c3/c3.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/plugins/datapicker/datepicker3.css')!!}" rel="stylesheet" type="text/css"/>
@endsection

@php
    use Carbon\Carbon;

    $total_number=$products->count();
    $brands_store=[];
    $stores_name=[];
    $stores_name[]='x';
    $tmp=[];

@endphp

@foreach($products->get()->groupBy('store_id') as $store)
    @php
        $stores_name[]= MyHelper::getStoreName($store[0]->store_id);
        $stores_ids[]= $store[0]->store_id;
    @endphp
@endforeach

@php
    $brands_store[]=$stores_name;
@endphp

@foreach($products->get()->groupBy('item_id') as $brand)
    @php
        $brands_names[]= MyHelper::getProductName($brand[0]->item_id);
        $brands_ids[]= $brand[0]->brand_id;

         //sub loop for store
         $tmp[]=MyHelper::getProductName($brand[0]->item_id);
     foreach ($stores_ids as $store_id){

          //not work if i apply filters TODO fix this part
          $total_per_store=DB::table('products')->where('store_id',$store_id)
            ->where('product_status_id',$_GET['product_status_id']);

        $brand_weight=DB::table('products')->where('item_id', $brand[0]->item_id)
            ->where('store_id',$store_id)
            ->where('product_status_id',$_GET['product_status_id']);

          if(isset($_GET['filter'])){
          switch ($_GET['filter']) {
            case 'today':
                $total_per_store = $total_per_store->where('created_at', '>=', Carbon::today());
                $brand_weight = $brand_weight->where('created_at', '>=', Carbon::today());
                break;
            case 'week':
                $current = Carbon::now();
                $today = Carbon::now();
                $last_week = $current->subWeek();
                $total_per_store = $total_per_store->whereBetween('created_at', [$last_week, $today]);
                $brand_weight = $brand_weight->whereBetween('created_at', [$last_week, $today]);
                break;
            case 'month':
                $current = Carbon::now();
                $today = Carbon::now();
                $last_month = $current->subMonth();
                $total_per_store = $total_per_store->whereBetween('created_at', [$last_month, $today]);
                $brand_weight = $brand_weight->whereBetween('created_at', [$last_month, $today]);
                break;

            case 'custom':
                $to = new DateTime($request->to);
                $from = new DateTime($request->from);
                $total_per_store = $total_per_store->whereBetween('created_at', [$from, $to]);
                $brand_weight = $brand_weight->whereBetween('created_at', [$from, $to]);
                break;
        }
        }


            //applying count after do filtering
            $total_per_store=$total_per_store->count();
            $brand_weight=$brand_weight->count();


            if($total_per_store==0)
            $total_per_store=1;

            $tmp[]=bcdiv((($brand_weight/$total_per_store)*100),1,2);
     }
    $brands_store[]=$tmp;
    $tmp=[];



    @endphp



@endforeach

@section('content')

    <!---------------------------- filters ------------------------------------->
    <div class="ibox-title">
        <h5>Products</h5>
        @if(!isset($_GET['store_id']))
            <form method="get" action="{{route('dashboard.chartDetails')}}">
                <div class="col-md-4 " id="data_5">
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control" name="from" value="">
                        <span class="input-group-addon">to</span>
                        <input type="text" class="input-sm form-control" name="to" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <select class="form-control m-b" name="item_id" id="item_id">
                        <option value="" selected> Product</option>
                        @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-2 @if($errors->has('category_id')) has-error @endif">
                    <select class="form-control m-b" name="category_id" id="category">
                        <option disabled selected>Category</option>
                    </select>
                    @if($errors->has("category_id"))
                        <span class="help-block">{{ $errors->first("category_id") }}</span>
                    @endif
                </div>


                <div class="form-group col-md-2 @if($errors->has('sub_category_id')) has-error @endif">
                    <select class="form-control m-b" name="sub_category_id" id="sub_category">
                        <option disabled selected> Sub category</option>
                    </select>
                    @if($errors->has("sub_category_id"))
                        <span class="help-block">{{ $errors->first("sub_category_id") }}</span>
                    @endif
                </div>

                <div class="form-group col-md-2 @if($errors->has('model_id')) has-error @endif">
                    <select class="form-control m-b" name="model_id" id="model_id">
                        <option disabled selected>Model</option>
                    </select>
                    @if($errors->has("model_id"))
                        <span class="help-block">{{ $errors->first("model_id") }}</span>
                    @endif
                </div>

                <div class="col-md-2">
                    <select class="form-control m-b" name="account" id="account">
                        <option value="" >Select Account</option>
                        @foreach($accounts as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="product_status_id" value="{{$_GET['product_status_id']}}">

                <div class="col-md-2">
                    <button class="btn btn-warning btn-search"   type="submit">Search
                    </button>
                </div>
                <input type="hidden" name="filter" value="custom">
            </form>
            <button class="btn btn-warning btn-circle" id="month" type="button">M
            </button>
            <button class="btn btn-warning btn-circle" id="week" type="button">W
            </button>
            <button class="btn btn-warning btn-circle" id="today" type="button">T
            </button>

        @endif
    </div>

    <!---------------------------- filters ------------------------------------->

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Statistics</h5>

                </div>
                <div class="ibox-content">
                    <div>
                        <div id="stocked"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection



@section('scripts')
    <!-- define your scripts here -->
    <script src="{!! URL::asset('js/plugins/d3/d3.min.js') !!}" type="text/javascript"></script>
    <script src="{!! URL::asset('js/plugins/c3/c3.min.js') !!}" type="text/javascript"></script>

    <script src="{!! URL::asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}" type="text/javascript"></script>
    <script src="{!! URL::asset('js/plugins/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>


    <script>
        $(document).ready(function () {



            /************************************************/
            /************************************************/
            $('#item_id').change(function () {
                if ($(this).val() != '') {
                    $('#category').html('');
                    $.getJSON('/get_categories?id=' + $('#item_id').val(), function (data) {
                        $('#category').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });

                    $('#model_id').html('');
                    $.getJSON('/get_models?id=' + $('#item_id').val(), function (data) {
                        $('#model_id').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });

                }
                setTimeout(
                        function() {
                            $('#sub_category').html('');
                            $.getJSON('/get_sub_categories?id=' + $('#category').val(), function (data) {
                                $('#sub_category').html($.map(data, function (item, index) {
                                    return '<option value=' + item.id + '>' + item.name + '</option>'
                                }));
                            });
                        },
                        600);

            });

            //on change to load sub categories
            $('#category').change(function () {
                if ($(this).val() != '') {
                    $('#sub_category').html('');
                    $.getJSON('/get_sub_categories?id=' + $('#category').val(), function (data) {
                        $('#sub_category').html($.map(data, function (item, index) {
                            return '<option value=' + item.id + '>' + item.name + '</option>'
                        }));
                    });
                }
            });

            /************************************************/
            /************************************************/
            /************************************************/


            var chart = c3.generate({
                bindto: '#stocked',
                data: {
                    x: 'x',
                    columns: @php echo json_encode($brands_store); @endphp
                    ,
                    type: 'bar'

                },
                axis: {
                    x: {
                        type: 'category'
                    }
                }
            });


            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#month , #week, #today').click(function () {
                window.location.replace("{{URL::to('/chart_details?filter=')}}" + $(this).attr('id') + '&&product_status_id=' +@php echo $_GET['product_status_id'] @endphp)

            });

        });

    </script>
@endsection