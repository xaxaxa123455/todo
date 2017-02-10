@extends("layout.master")

@section("title", "Admin :: Dashboard")

@section("content")


    <div id="exTab1" class="container">
        <p class="text-right">You are logged in as {{ Auth::user()->name }} <a href="/user/logout">
                <button class="btn btn-primary">Logout</button>
            </a></p>
        <ul class="nav nav-tabs">
            <li {!! (Request::is('admin/dashboard')?'class="active"':null) !!}>
                <a href="/admin/dashboard" >Dashboard</a>
            </li>
            <li {!! (Request::is('admin/users')?'class="active"':null) !!}><a href="/admin/users" >Users</a>
            </li>
            <li><a href="#3a" >Lists</a>
            </li>

        </ul>

        <div class="tab-content clearfix">
            @yield("currentTab")



            <div class="tab-pane" id="3a">

            </div>

        </div>
    </div>





@stop

