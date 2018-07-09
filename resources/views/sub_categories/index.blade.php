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
                        <h5>sub categories</h5>
                        <div class="ibox-tools">
                            <a class=""  href="{{ route('sub_categories.create') }}">
                                create new  <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>category</th>
                                    <th>sub category</th>
                                    <th class="text-right">OPTIONS</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{$sub_category->id}}</td>
                                        <td>{{$sub_category->category->name}}</td>
                                        <td>{{$sub_category->name}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('sub_categories.show', $sub_category->id) }}"><i
                                                        class="glyphicon glyphicon-eye-open"></i> View</a>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('sub_categories.edit', $sub_category->id) }}"><i
                                                        class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <form action="{{ route('sub_categories.destroy', $sub_category->id) }}"
                                                  method="POST" style="display: inline;"
                                                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-xs btn-warning"><i
                                                            class="glyphicon glyphicon-trash"></i> Delete
                                                </button>
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
                    {extend: 'excel', title: 'sub categories'},
                    {extend: 'pdf', title: 'sub categories'},

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
