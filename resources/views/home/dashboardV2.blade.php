@extends('adminLayout')


@section('css')
<link href="{!! URL::asset('css/plugins/c3/c3.min.css')!!}" rel="stylesheet" type="text/css"/>
<link href="{!! URL::asset('css/plugins/datapicker/datepicker3.css')!!}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="row">

    <!---------------------------- filters ------------------------------------->
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if(isset($_GET['filter']))
                <a href="{{route('dashboard.chartDetails',['product_status_id'=>1,'filter'=>$_GET['filter']])}}">
                    @else
                    <a href="{{route('dashboard.chartDetails',['product_status_id'=>1])}}">
                        @endif
                        <h5>Sales </h5>
                    </a>

            </div>
            <div class="ibox-content">
                <div>
                    <div id="sales"></div>

                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if(isset($_GET['filter']))
                <a href="{{route('dashboard.chartDetails',['product_status_id'=>2,'filter'=>$_GET['filter']])}}">
                    @else
                    <a href="{{route('dashboard.chartDetails',['product_status_id'=>2])}}">
                        @endif
                        <h5>OOS </h5>
                    </a>

            </div>
            <div class="ibox-content">
                <div>
                    <div id="oos"></div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--
<div class="row">--}}
    {{--
    <div class="col-lg-6">--}}
        {{--
        <div class="ibox float-e-margins">--}}
            {{--
            <div class="ibox-title">--}}
                {{--@if(isset($_GET['filter']))--}}
                {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>3,'filter'=>$_GET['filter']])}}">--}}
                    {{--@else--}}
                    {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>3])}}">--}}
                        {{--@endif--}}
                        {{--<h5>POP </h5>--}}
                        {{--</a>--}}

                    {{--</div>
            --}}
            {{--
            <div class="ibox-content">--}}
                {{--
                <div>--}}
                    {{--
                    <div id="POP"></div>
                    --}}
                    {{--
                </div>
                --}}
                {{--
            </div>
            --}}
            {{--
        </div>
        --}}
        {{--
    </div>
    --}}


    {{--
    <div class="col-lg-6">--}}
        {{--
        <div class="ibox float-e-margins">--}}
            {{--
            <div class="ibox-title">--}}
                {{--@if(isset($_GET['filter']))--}}
                {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>5,'filter'=>$_GET['filter']])}}">--}}
                    {{--@else--}}
                    {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>5])}}">--}}
                        {{--@endif--}}
                        {{--<h5>RFDI</h5>--}}
                        {{--</a>--}}

                    {{--</div>
            --}}
            {{--
            <div class="ibox-content">--}}
                {{--
                <div>--}}
                    {{--
                    <div id="Removed"></div>
                    --}}
                    {{--
                </div>
                --}}
                {{--
            </div>
            --}}
            {{--
        </div>
        --}}
        {{--
    </div>
    --}}

    {{--
</div>--}}


<div class="row">

    <div class="col-lg-6">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if(isset($_GET['filter']))
                <a href="{{route('dashboard.chartDetails',['product_status_id'=>4,'filter'=>$_GET['filter']])}}">
                    @else
                    <a href="{{route('dashboard.chartDetails',['product_status_id'=>4])}}">
                        @endif
                        <h5>Damaged</h5>
                    </a>

            </div>
            <div class="ibox-content">
                <div>
                    <div id="Damaged"></div>
                </div>
            </div>
        </div>
    </div>

    {{--
    <div class="col-lg-6">--}}

        {{--
        <div class="ibox float-e-margins">--}}
            {{--
            <div class="ibox-title">--}}
                {{--@if(isset($_GET['filter']))--}}
                {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>6,'filter'=>$_GET['filter']])}}">--}}
                    {{--@else--}}
                    {{--<a href="{{route('dashboard.chartDetails',['product_status_id'=>6])}}">--}}
                        {{--@endif--}}

                        {{--<h5>In Display</h5>--}}
                        {{--</a>--}}

                    {{--</div>
            --}}
            {{--
            <div class="ibox-content">--}}
                {{--
                <div>--}}
                    {{--
                    <div id="in_display"></div>
                    --}}
                    {{--
                </div>
                --}}
                {{--
            </div>
            --}}
            {{--
        </div>
        --}}
        {{--
    </div>
    --}}

    <div class="col-lg-6">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if(isset($_GET['filter']))
                <a href="{{route('dashboard.chartDetails',['product_status_id'=>7,'filter'=>$_GET['filter']])}}">
                    @else
                    <a href="{{route('dashboard.chartDetails',['product_status_id'=>7])}}">
                        @endif
                        <h5>Shelf Share</h5>
                    </a>

            </div>
            <div class="ibox-content">
                <div>
                    <div id="shelf_share"></div>
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

@endsection
