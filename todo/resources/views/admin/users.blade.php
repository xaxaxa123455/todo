@extends("layout.admin")

@section("currentTab")
    <div class="tab-pane active">
        <table class="table">
            <thead>
            <tr>
                <th>Selected</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-right">Created</th>
                <th class="text-right">Last login</th>
                <th>Suspended</th>
                <th>Lists</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td class="text-center">{!! Form::checkBox('selectedUsers') !!}</td>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-right">{{ $user->created_at }}</td>
                    <td class="text-right">{{ $user->lastLogin }}</td>
                    <td class="text-center">{{ ($user->suspended)?'Yes':'No' }}</td>
                    <td>{{ $user->taskLists->count() }}</td>
                    <td>
                        {{ Form::open(['class' => 'delete', 'method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        <a href="/admin/users/loginas/{{ $user->id }}">
                            <button type="button" class="btn btn-info">Login as this user</button>
                        </a>
                        <a href="/admin/users/suspend/{{ $user->id }}">
                            <button type="button" class="btn btn-warning">{{ ($user->suspended)?'Unsuspend':'&nbsp;&nbsp;Suspend&nbsp;&nbsp;' }}</button>
                        </a>
                        {{ Form::close() }}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop