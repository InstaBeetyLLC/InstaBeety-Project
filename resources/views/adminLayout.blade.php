<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SeamLabs | Dashboard</title>
    <link href="{!! URL::asset('css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('font-awesome/css/font-awesome.css')!!}" rel="stylesheet" type="text/css"/>

    <!-- Toastr style -->
    <link href="{!! URL::asset('css/plugins/toastr/toastr.min.css')!!}" rel="stylesheet" type="text/css"/>

    <!-- Gritter -->
    <link href="{!! URL::asset('js/plugins/gritter/jquery.gritter.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/animate.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/style.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/custom.css')!!}" rel="stylesheet" type="text/css"/>

    @yield('css')

</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            @include('shared._menu')
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">

        @include('shared._top_panel')
        {{--@include('shared._page_navigation')--}}
        @yield('content')
        {{--@include('shared._footer')--}}

    </div>

    <div class="modal inmodal" id="idleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <i class="fa fa-clock-o modal-icon"></i>
                    <h4 class="modal-title">are You There ?</h4>
                    <small>after 20 second application will logout press yes if you are there .</small>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeModal();" class="btn btn-primary" data-dismiss="modal">yes</button>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Mainly scripts -->
<script src="{!! URL::asset('js/jquery-2.1.1.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>

<!-- Flot -->
<script src="{!! URL::asset('js/plugins/flot/jquery.flot.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/flot/jquery.flot.spline.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/flot/jquery.flot.resize.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/flot/jquery.flot.pie.js') !!}" type="text/javascript"></script>

<!-- Peity -->
<script src="{!! URL::asset('js/plugins/peity/jquery.peity.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/demo/peity-demo.js') !!}" type="text/javascript"></script>

<!-- Custom and plugin javascript -->
<script src="{!! URL::asset('js/inspinia.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('js/plugins/pace/pace.min.js') !!}" type="text/javascript"></script>


<!-- jQuery UI -->
<script src="{!! URL::asset('js/plugins/jquery-ui/jquery-ui.min.js') !!}" type="text/javascript"></script>

<!-- GITTER -->
<script src="{!! URL::asset('js/plugins/gritter/jquery.gritter.min.js') !!}" type="text/javascript"></script>

<!-- Sparkline -->
<script src="{!! URL::asset('js/plugins/sparkline/jquery.sparkline.min.js') !!}" type="text/javascript"></script>

<!-- Sparkline demo data  -->
<script src="{!! URL::asset('js/demo/sparkline-demo.js') !!}" type="text/javascript"></script>

<!-- ChartJS-->
<script src="{!! URL::asset('js/plugins/chartJs/Chart.min.js') !!}" type="text/javascript"></script>


<!-- Toastr -->
<script src="{!! URL::asset('js/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>


@yield('scripts')


<script>
    $(document).ready(function () {


        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };

            @if(\Illuminate\Support\Facades\Session::has('message'))
                    toastr.success("{{ Session::get('message') }}", 'success');
            @endif


        }, 1300);


        var data1 = [
            [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
        ];
        var data2 = [
            [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                    data1, data2
                ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis: {},
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                }
        );

        var doughnutData = [
            {
                value: 300,
                color: "#a3e1d4",
                highlight: "#1ab394",
                label: "App"
            },
            {
                value: 50,
                color: "#dedede",
                highlight: "#1ab394",
                label: "Software"
            },
            {
                value: 100,
                color: "#A4CEE8",
                highlight: "#1ab394",
                label: "Laptop"
            }
        ];

        var doughnutOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 45, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false
        };

//        var ctx = document.getElementById("doughnutChart").getContext("2d");
//        var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

        var polarData = [
            {
                value: 300,
                color: "#a3e1d4",
                highlight: "#1ab394",
                label: "App"
            },
            {
                value: 140,
                color: "#dedede",
                highlight: "#1ab394",
                label: "Software"
            },
            {
                value: 200,
                color: "#A4CEE8",
                highlight: "#1ab394",
                label: "Laptop"
            }
        ];

        var polarOptions = {
            scaleShowLabelBackdrop: true,
            scaleBackdropColor: "rgba(255,255,255,0.75)",
            scaleBeginAtZero: true,
            scaleBackdropPaddingY: 1,
            scaleBackdropPaddingX: 1,
            scaleShowLine: true,
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false
        };

    });

    @role(('promoter'))
    idleTimer = null;
    idleState = false;
    idleWait = 60000; //after 1 minutes

    (function ($) {
        $(document).ready(function () {
            $('*').bind('mousemove keydown scroll', function () {
                clearTimeout(idleTimer);
                if (idleState == true) {
                    // Reactivated event
                   console.log('back Event');
                }
                idleState = false;
                idleTimer = setTimeout(function () {
                    // Idle Event
                    iamHere();
                    setTimeout(userIsIdle, 30000);
                    idleState = true;
                }, idleWait);
            });
            $("body").trigger("mousemove");
        });
    })(jQuery);
    @endrole

    var base_url = {!! json_encode(url('/')) !!};

    /**
     * function will send ajax to logout user
     * and update some events
     */
    function userIsIdle() {
        if ($('#idleModal').is(':visible')) {
            clearTimeout(idleTimer);
            $('#idleModal').toggle();
            window.location.replace(base_url + "/logoutUser");


        }

    }

    function iamHere() {
        if (!$('#idleModal').is(':visible')) {
            $('#idleModal').toggle();
        }
    }

    function closeModal(){
        $('#idleModal').toggle();
    }


</script>
</body>
</html>
