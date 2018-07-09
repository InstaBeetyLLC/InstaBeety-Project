<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element"> <span>


    @if(isset(Auth::user()->photo))
           {{--<img alt="image" class="img-circle" src="{!! URL::asset()!!}"/>--}}
           <img alt="image" class="img-circle" src="{!! route('imager',['size'=>'50*50','image'=>Auth::user()->photo])!!}"/>
    @else
            <img alt="image" class="img-circle" src="{!! URL::asset('img/profile_small.jpg')!!}"/>
    @endif



                             </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">seam labs</strong>
                             </span> <span class="text-muted text-xs block"> {{ Auth::user()->name }} <b
                                            class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="{{route('users.profile')}}">Profile</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout</a></li>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </ul>
        </div>
        <div class="logo-element">
           <img width="50%" height="50%" src="data:img/png;base64,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">
        </div>
    </li>


    @role(('admin'))
    <li >
        <a href="{{url('dashboardV2')}}"><i class="demo-icon icon-dashboard">&#xe804;</i><span
                    class="nav-label">Dashboard</span></a>
    </li>


    <li>
        <a href="#"><i class="demo-icon icon-user">&#xe80b;</i> <span class="nav-label">Access management</span><span
                    class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                <a href="{{route('users.index')}}">Access Management</a>
            </li>


        </ul>
    </li>


    <li>
        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Management</span><span
                    class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">


            <li>
                <a href="{{route('regions.index')}}">Regions</a>
            </li>

            <li>
                <a href="{{route('cities.index')}}">
                            Cities</a>
            </li>

            <li>
                <a href="{{route('locations.index')}}"> Locations</a>
            </li>



            <li>
                <a href="{{route('categories.index')}}">Categories</a>
            </li>

            <li>
                <a href="{{route('sub_categories.index')}}">Sub categories</a>
            </li>


        </ul>
    </li>



    @endrole



</ul>
