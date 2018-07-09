@extends('adminLayout')


@section('css')
    <link href="{!! URL::asset('css/plugins/chartist/chartist.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/custom_charts.css')!!}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @php
        $total_sales_number=$sales->count();
        $total_oos_number=$oos->count();
        $total_pop_number=$pop->count();
        $total_damage_number=$damage->count();
        $total_removed_number=$removed->count();
        $total_in_display_number=$in_display->count();
        $total_shelf_share_number=$shelf_share->count();
    @endphp

    @foreach($sales->get()->groupBy('brand_id') as $sale_product)
        @php
            $sales_labels[]= $sale_product[0]->brand->name;
            $sales_series[]=(int)((count($sale_product)/$total_sales_number)*100);
        @endphp
    @endforeach

    @foreach($oos->get()->groupBy('brand_id') as $oos_product)
        @php
            $oos_labels[]= $oos_product[0]->brand->name;
            $oos_series[]=(int)((count($oos_product)/$total_oos_number)*100);
        @endphp
    @endforeach

    @foreach($pop->get()->groupBy('brand_id') as $pop_product)
        @php
            $pop_labels[]= $pop_product[0]->brand->name;
            $pop_series[]=(int)((count($pop_product)/$total_pop_number)*100);
        @endphp
    @endforeach

    @foreach($damage->get()->groupBy('brand_id') as $damage_product)
        @php
            $damage_labels[]= $damage_product[0]->brand->name;
            $damage_series[]=(int)((count($damage_product)/$total_damage_number)*100);
        @endphp
    @endforeach

    @foreach($removed->get()->groupBy('brand_id') as $removed_product)
        @php
            $removed_labels[]= $removed_product[0]->brand->name;
            $removed_series[]=(int)((count($removed_product)/$total_removed_number)*100);
        @endphp
    @endforeach

    @foreach($in_display->get()->groupBy('brand_id') as $in_display_product)
        @php
            $in_display_labels[]= $in_display_product[0]->brand->name;
            $in_display_series[]=(int)((count($in_display_product)/$total_in_display_number)*100);
        @endphp
    @endforeach
    @foreach($shelf_share->get()->groupBy('brand_id') as $shelf_share_product)
        @php
            $shelf_share_labels[]= $shelf_share_product[0]->brand->name;
            $shelf_share_series[]=(int)((count($shelf_share_product)/$total_shelf_share_number)*100);
        @endphp
    @endforeach


    <div class="row">

        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>1])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sales</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-sales" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-sales"></ul>
                </div>
            </div>
            </a>

        </div>

        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>2])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Out OF Stock</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-oos" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-oos"></ul>
                </div>
            </div>
                </a>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>3])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>POP</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-pop" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-pop"></ul>
                </div>
            </div>
                </a>
        </div>

        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>4])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Damaged</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-damage" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-damage"></ul>
                </div>
            </div>
                </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>5])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Removed</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-removed" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-removed"></ul>
                </div>
            </div>
                </a>
        </div>

        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>6])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>In Display</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-in_display" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-in_display"></ul>
                </div>
            </div>
                </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <a href="{{route('dashboard.chartDetails',['product_status_id'=>7])}}">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Shelf Share</h5>
                </div>
                <div class="ibox-content">
                    <div id="ct-shelf_share" class="ct-perfect-fourth"></div>
                    <ul class="ct-legend-shelf_share"></ul>
                </div>
            </div>
                </a>
        </div>
    </div>
@endsection



@section('scripts')
    <!-- define your scripts here -->
    <script src="{!! URL::asset('js/plugins/chartist/chartist.min.js') !!}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            //oos
            var tmp_labels =@php echo json_encode($oos_labels); @endphp ;
            var tmp_series =@php echo json_encode($oos_series); @endphp ;
            var legend = $('.ct-legend-oos'),

                    data = {
                        //labels
                        labels: tmp_labels,
                        series: tmp_series
                    };
            Chartist.Pie('#ct-oos', data);
            //draw colors
            $.each(data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + data.series[i] + '%')
                        .appendTo(legend);
            });


            /********************************************************************************************************/
            /********************************************************************************************************/
            //sales
            var tmp_sales_labels =@php echo json_encode($sales_labels); @endphp ;
            var tmp_sales_series =@php echo json_encode($sales_series); @endphp ;
            var sales_legend = $('.ct-legend-sales'),

                    sales_data = {
                        //labels
                        labels: tmp_sales_labels,
                        series: tmp_sales_series
                    };
            Chartist.Pie('#ct-sales', sales_data);
            //draw colors
            $.each(sales_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + sales_data.series[i] + '%')
                        .appendTo(sales_legend);
            });

            /********************************************************************************************************/
            /********************************************************************************************************/
            //pop
            var tmp_pop_labels =@php echo json_encode($pop_labels); @endphp ;
            var tmp_pop_series =@php echo json_encode($pop_series); @endphp ;
            var pop_legend = $('.ct-legend-pop'),

                    pop_data = {
                        //labels
                        labels: tmp_pop_labels,
                        series: tmp_pop_series
                    };
            Chartist.Pie('#ct-pop', pop_data);
            //draw colors
            $.each(pop_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + pop_data.series[i] + '%')
                        .appendTo(pop_legend);
            });


            /********************************************************************************************************/
            /********************************************************************************************************/
            //damage
            var tmp_damage_labels =@php echo json_encode($damage_labels); @endphp ;
            var tmp_damage_series =@php echo json_encode($damage_series); @endphp ;
            var damage_legend = $('.ct-legend-damage'),

                    damage_data = {
                        //labels
                        labels: tmp_damage_labels,
                        series: tmp_damage_series
                    };
            Chartist.Pie('#ct-damage', damage_data);
            //draw colors
            $.each(damage_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + damage_data.series[i] + '%')
                        .appendTo(damage_legend);
            });
            /********************************************************************************************************/
            /********************************************************************************************************/
            //removed
            var tmp_removed_labels =@php echo json_encode($removed_labels); @endphp ;
            var tmp_removed_series =@php echo json_encode($removed_series); @endphp ;
            var removed_legend = $('.ct-legend-removed'),

                    removed_data = {
                        //labels
                        labels: tmp_removed_labels,
                        series: tmp_removed_series
                    };
            Chartist.Pie('#ct-removed', removed_data);
            //draw colors
            $.each(removed_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + removed_data.series[i] + '%')
                        .appendTo(removed_legend);
            });
            /********************************************************************************************************/
            /********************************************************************************************************/
            //in display
            var tmp_in_display_labels =@php echo json_encode($in_display_labels); @endphp ;
            var tmp_in_display_series =@php echo json_encode($in_display_series); @endphp ;
            var in_display_legend = $('.ct-legend-in_display'),

                    in_display_data = {
                        //labels
                        labels: tmp_in_display_labels,
                        series: tmp_in_display_series
                    };
            Chartist.Pie('#ct-in_display', in_display_data);
            //draw colors
            $.each(in_display_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + in_display_data.series[i] + '%')
                        .appendTo(in_display_legend);
            });

            /********************************************************************************************************/
            /********************************************************************************************************/
            //in display
            var tmp_shelf_share_labels =@php echo json_encode($shelf_share_labels); @endphp ;
            var tmp_shelf_share_series =@php echo json_encode($shelf_share_series); @endphp ;
            var shelf_share_legend = $('.ct-legend-shelf_share'),

                    shelf_share_data = {
                        //labels
                        labels: tmp_shelf_share_labels,
                        series: tmp_shelf_share_series
                    };
            Chartist.Pie('#ct-shelf_share', shelf_share_data);
            //draw colors
            $.each(shelf_share_data.labels, function (i, val) {
                var listItem = $('<li />')
                        .addClass('ct-series-' + i)
                        .html('<strong>' + val + '</strong>: ' + shelf_share_data.series[i] + '%')
                        .appendTo(shelf_share_legend);
            });


        });

    </script>
@endsection