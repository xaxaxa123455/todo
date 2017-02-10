@extends("layout.admin")

@section("currentTab")
    <div class="tab-pane active">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Total users: </strong>{{ $totalUsers }}</p>
                <p><strong>Total lists: </strong>{{ $totalLists }}</p>
                <p class="red"><strong>List items: </strong>91 open, 122 closed</p>
                <p class="red">2 lists and 13 items created yesterday</p>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="panel container-fluid">
                    {{ Form::open() }}
                    {{--From, subject, body, send--}}
                    <div class="form-group row col-sm-offset-0">
                        {!! Form::label("from", "From", ['class' => 'col-xs-12 col-sm-2']) !!}
                        {!! Form::text("from", null, ['class' => 'col-xs-12 col-sm-10']) !!}
                        @if ($errors->has('from')) <p
                                class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('from') }}</p> @endif
                    </div>

                    <div class="form-group row col-sm-offset-0">
                        {!! Form::label("subject", "Subject", ['class' => 'col-xs-12 col-sm-2']) !!}
                        {!! Form::text("subject", null, ['class' => 'col-xs-12 col-sm-10']) !!}
                        @if ($errors->has('subject')) <p
                                class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('subject') }}</p> @endif
                    </div>

                    <div class="form-group row col-sm-offset-0">
                        {!! Form::label("body", "Body", ['class' => 'col-xs-12 col-sm-2']) !!}
                        {!! Form::textArea("body", null, ['class' => 'col-xs-12 col-sm-10']) !!}
                        @if ($errors->has('body')) <p
                                class="col-xs-12 col-sm-5 col-sm-offset-3 error-block">{{ $errors->first('body') }}</p> @endif
                    </div>

                    <div class="form-group row col-sm-offset-0 text-right">
                        {!! Form::submit("Send", ['class' => 'btn btn-default']) !!}
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
@stop
