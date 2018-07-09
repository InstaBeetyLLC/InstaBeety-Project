<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>
            @if(isset($title))
                {{$title}}
            @endif
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    @php
                        echo $trimmed = str_replace('Controller', '', $controller);
                    @endphp
                </a>

            </li>
            <li class="active">
                <strong>{{$action}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
