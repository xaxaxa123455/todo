@extends("layout.master")

@section("title", "Login")

@section("content")

    @if (session()->has('suc_message'))
    <p class="bg-success text-center text-success">{{ session('suc_message') }}</p>
    @endif

    @if (session()->has('err_message'))
        <p class="bg-danger text-center text-danger">{{ session('err_message') }}</p>
    @endif

    <div class="panel clearfix col-sm-8 col-sm-offset-2">
    {!! Form::open() !!}

    <div class="form-group row col-sm-offset-0">
        {!! Form::label("name", "User name", ['class' => 'col-xs-12 col-sm-3']) !!}
        {!! Form::text("name", null, ['class' => 'col-xs-12 col-sm-8']) !!}
        @if ($errors->has('name')) <p
                class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('name') }}</p> @endif
    </div>

    <div class="form-group row col-sm-offset-0">
        {!! Form::label("password", "Password", ['class' => 'col-xs-12 col-sm-3']) !!}
        {!! Form::password("password", ['class' => 'col-xs-12 col-sm-8']) !!}
        @if ($errors->has('password')) <p
                class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('password') }}</p> @endif
    </div>

    <div class="form-group row col-xs-12 text-center">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4"><input type="checkbox" name="remember"> Remember me</div>
    </div>


    <div class="form-group row col-xs-12 text-center">
        {!! Form::submit("Login", ['class' => 'btn btn-default']) !!}
        <a href="/user/register"><button type="button" class="btn btn-info">Register</button></a>
    </div>

    {!! Form::close() !!}

    </div>
@stop