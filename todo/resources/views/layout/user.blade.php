@extends("layout.master")

@section("content")
    @if (session()->has('suc_message'))
        <p class="bg-success text-center text-success">{{ session('suc_message') }}</p>
    @endif

    @if (session()->has('err_message'))
        <p class="bg-danger text-center text-danger">{{ session('err_message') }}</p>
    @endif

    <div class="text-right">
        Hello, {{ Auth::user()->name }}! Welcome to your dashboard!
        <a href="">My account</a>
        <a href="/user/logout">Logout</a>
    </div>

    <div class="panel clearfix">
        @yield("usercontent")
    </div>
@stop