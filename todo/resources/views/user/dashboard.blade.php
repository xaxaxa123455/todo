@extends("layout.user")

@section("title", "Dashboard")

@section("usercontent")

    <div class="col-xs-12 col-sm-8">
    @foreach($lists as $list)
        <div class="panel">

            {{ Form::open(['class' => 'delete', 'method' => 'DELETE', 'action' => ['ListsController@destroy', $list->id]]) }}
            <div class="col-xs-12 col-sm-10">{{ $list->name }}</div>
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </div>
    @endforeach
    </div>

    <div class="col-xs-12 col-sm-4">
        <a href="#"><button class="btn btn-info">New</button></a>

        <div class="panel marginTop20">
            {!! Form::open() !!}
            <div class="form-group row col-sm-offset-0">
                {!! Form::label("name", "Name") !!}
                {!! Form::text("name") !!}
                @if ($errors->has('name')) <p
                        class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('name') }}</p> @endif
            </div>
            {!! Form::label("copy_from", "Copy items from") !!}
            {!! Form::select('copy_from', $lists2, 0, ['class' => 'form-control']) !!}
            {!! Form::submit("Add", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
