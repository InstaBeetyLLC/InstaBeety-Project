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
                        <h5>Models</h5>
                        <div class="ibox-tools">
                            <a class=""  href="{{ route('models.create') }}">
                                create new <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Model</th>
                                    <th class="text-right">OPTIONS</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($models as $model)
                                    <tr>
                                        <td>{{$model->id}}</td>
                                        <td>{{$model->item->name}}</td>
                                        <td>{{$model->name}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-info" href="{{ route('models.show', $model->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                            <a class="btn btn-xs btn-primary" href="{{ route('models.edit', $model->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <form action="{{ route('models.destroy', $model->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                            </form>
                                        </td>
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
                    {extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2]
                        }, title: 'Models'},
                    {extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2]
                        }, title: 'Models'},

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
