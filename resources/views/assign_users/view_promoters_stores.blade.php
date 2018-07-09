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
                        <h5>Promoters</h5>
                        <div class="ibox-tools">
                            <a class=""  href="{{ route('assignPromoter') }}">
                                assign promoter <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example ">
                                <thead>
                                <tr>
                                    <th>Promoter</th>
                                    <th>Store</th>
                                    <th>Account</th>
                                    <th>Product</th>
                                    <th>Supervisor</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $tmpList=[]; @endphp
                                    @foreach($promoters as $promoter)
                                           @if(!in_array($promoter->promoter_id,$tmpList))
                                            <tr>
                                                <td>{{$promoter->my->name}}</td>
                                                <td>{{$promoter->account->store->name}}</td>
                                                <td>{{$promoter->account->name}}</td>
                                                <td>{{$promoter->item->name}}</td>
                                                <td>{{$promoter->manager->name}}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-warning" href="{{URL::route('assignedPromoters.edit',['id'=>$promoter->id ])}}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                    <form action="{{ route('deletePromoterStore', ['id'=>$promoter->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                                    </form>


                                                </td>
                                            </tr>
                                            @php
                                                $tmpList[]=$promoter->promoter_id;
                                            @endphp
                                        @endif
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
                    {extend: 'excel', title: 'Promoters Stores'},
                    {extend: 'pdf', title: 'Promoters Stores'},

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
