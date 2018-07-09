@extends('adminLayout')
@section('css')
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="mail-box-header">

                    <h2>
                        Inbox ({{count($messages)}})
                    </h2>

                    <div class="mail-tools tooltip-demo m-t-md">
                        <a class="btn  btn-primary compose-mail" href="{{ route('composeEmail') }}">Compose Mail</a>
                        <button class="btn btn-white btn-sm" onclick="if(confirm('Delete? Are you sure?')) { deleteMessages() } else {return false };"><i class="fa fa-trash-o"></i> </button>

                    </div>

                </div>
                <div class="mail-box">

                    <table class="table table-hover table-mail">
                        <tbody>

                        <!-- unread-->
                        <tr>
                            <td class="check-mail">
                                <input name="select_all" id="mine"  onclick="doSelect()" value="" type="checkbox" class="i-checks">
                            </td>
                            <td class="check-mail">
                                <label>select All</label>
                            </td>

                            </tr>
                        <form id="bulkDeleteForm" action="{{ route('messages.bulkDelete') }}" method="post">
                        @foreach($messages as $message)
                            <tr class="@if($message->is_read) read @else unread @endif ">
                                <td class="check-mail">
                                    <input name="ids[]"  id="{{$message->id}}" value="{{$message->id}}" type="checkbox" class="i-checks">
                                </td>
                                <td class="mail-ontact"><a href="{{ route('emailView',['id'=>$message->id]) }}">{{$message->subject}}</a></td>
                                <td class="mail-subject"><a href="{{ route('emailView',['id'=>$message->id]) }}">{!!str_limit($message->body, 120, '...') !!}
                                    </a></td>
                                <td class=""></td>
                                <td class="text-right mail-date">{{$message->sender->name}}</td>
                                <td class="text-right mail-date">{{MyHelper::getCustomDifference($message->created_at)}}</td>
                            </tr>
                        @endforeach
                        </form>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function deleteMessages(){
            $("#bulkDeleteForm").submit()
        }

        function doSelect() {

            if ( $('#mine').is(":checked") ){

                $(".i-checks").prop('checked',true);
          }else{
              $(".i-checks").prop('checked',false);
          }
        }

        $(document).ready(function(){

        });
    </script>

@endsection
