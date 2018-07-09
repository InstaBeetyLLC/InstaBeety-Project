@extends('adminLayout')


@section('css')
    <link href="{!! URL::asset('css/plugins/dataTables/datatables.min.css')!!}" rel="stylesheet" type="text/css"/>
@endsection



@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>Account</h5>
                        <div class="ibox-tools">
                            <a class=""  href="{{ route('accounts.create') }}">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example ">
                                <thead>
                                <tr>
                                    <th>Promoter Name</th>
                                    <th>Manager</th>
                                    <th>Product</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promoters as $promoter)
                                    <tr>
                                        <td>{{$promoter->my->name}}</td>
                                        <td>{{$promoter->manager->name}}</td>
                                        <td>{{$promoter->item->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    {{--<script src="{!! URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}" type="text/javascript"></script>--}}
    <script src="{!! URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
    {{--<script src="{!! URL::asset('js/plugins/jeditable/jquery.jeditable.js') !!}" type="text/javascript"></script>--}}
    <script src="{!! URL::asset('js/plugins/dataTables/datatables.min.js') !!}" type="text/javascript"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Account'},
                    {extend: 'pdf', title: 'Account'},

                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });


        });
    </script>

@endsection
