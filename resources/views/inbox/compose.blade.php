@extends('adminLayout')
@section('css')
    <link href="{!! URL::asset('css/plugins/summernote/summernote.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/plugins/summernote/summernote-bs3.css')!!}" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('css/plugins/select2/select2.min.css')!!}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="{{ route('myInbox') }}" class="btn btn-danger btn-sm" data-toggle="tooltip"
                           data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                    </div>
                    <h2>
                        Compose mail
                    </h2>
                </div>
                <div class="mail-box">


                    <div class="mail-body">

                        <form class="form-horizontal" method="get">
                            <div class="form-group"><label class="col-sm-2 control-label">To:</label>
                                <div class="col-sm-10">
                                    @if(isset($_GET['email']))
                                        <!-- TODO fix this issue  -->
                                        <input type="text" id="email" readonly class="form-control" value="{{$_GET['email']}}">
                                     @else
                                        <select class="select2_demo_2 form-control" id="send_to" multiple="multiple">
                                            <option></option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Subject:</label>

                                <div class="col-sm-10">
                                    <input type="text" id="subject" class="form-control" value=""></div>
                            </div>

                            <input type="hidden" value="{{URL::to('/')}}" id="current_url">
                        </form>

                    </div>

                    <div class="mail-text h-200">

                        <div class="summernote">
                            <h3 id="test">Hello {{Auth::user()->name}}! </h3>
                            <br/>
                            <br/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mail-body text-right tooltip-demo">
                        <a onclick="sendEmail()" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                           title="Send"><i class="fa fa-reply"></i> Send</a>
                        <a href="{{ route('myInbox') }}" class="btn btn-white btn-sm" data-toggle="tooltip"
                           data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                    </div>
                    <div class="clearfix"></div>


                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <!-- SUMMERNOTE -->
    <script src="{!! URL::asset('js/plugins/summernote/summernote.min.js') !!}" type="text/javascript"></script>
    <script src="{!! URL::asset('js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>
    <script src="{!! URL::asset('js/mail_helper.js') !!}" type="text/javascript"></script>
@endsection
