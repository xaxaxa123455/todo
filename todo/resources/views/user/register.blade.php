@extends("layout.master")

@section("title", "Register")

@section("content")
    <div class="panel clearfix col-sm-8 col-sm-offset-2">
        {!! Form::open() !!}

        <div class="form-group row col-sm-offset-0">
            {!! Form::label("name", "User name", ['class' => 'col-xs-12 col-sm-3']) !!}
            {!! Form::text("name", null, ['class' => 'col-xs-12 col-sm-8']) !!}

            @if ($errors->has('name'))
                <p class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group row col-sm-offset-0">
            {!! Form::label("email", "E-Mail", ['class' => 'col-xs-12 col-sm-3']) !!}
            {!! Form::text("email", null, ['class' => 'col-xs-12 col-sm-8']) !!}
            @if ($errors->has('email')) <p
                    class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group row col-sm-offset-0">
            {!! Form::label("password", "Password", ['class' => 'col-xs-12 col-sm-3']) !!}
            {!! Form::password("password", ['class' => 'col-xs-12 col-sm-8 ']) !!}
            @if ($errors->has('password')) <p
                    class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('password') }}</p> @endif
        </div>

        <div class="form-group row col-sm-offset-0">
            {!! Form::label("password_confirm", "Repeat password", ['class' => 'col-xs-12 col-sm-3']) !!}
            {!! Form::password("password_confirm", ['class' => 'col-xs-12 col-sm-8']) !!}
            @if ($errors->has('password_confirm')) <p
                    class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('password_confirm') }}</p> @endif
        </div>

        <div class="form-group row col-xs-12 ">
            {!! Form::submit("Register", ['class' => 'col-xs-12 col-sm-4 col-sm-offset-4 clearfix btn btn-default']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop
