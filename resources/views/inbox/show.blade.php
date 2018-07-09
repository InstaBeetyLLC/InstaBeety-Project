@extends('adminLayout')
@section('css')
@endsection

@section('content')


    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="{{ route('composeEmail',['email'=>$message->sender->email]) }}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                        <a  href="{{ route('message.delete',['id'=>$message->id])}}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                    </div>
                    <h2>
                        View Message
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">


                        <h3>
                            <span class="font-noraml">Subject: </span>{{$message->subject}}
                        </h3>
                        <h5>
                            <span class="pull-right font-noraml">{{$message->created_at}}</span>
                            <span class="font-noraml">From: </span>{{$message->sender->email}}
                        </h5>
                    </div>
                </div>
                <div class="mail-box">


                    <div class="mail-body">
                        {!!$message->body!!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
