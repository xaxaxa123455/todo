<?php

namespace App\Http\Controllers;

use App\a;
use App\TaskList;
use Illuminate\Http\Request;

use App\Http\Requests;

class ListsController extends Controller
{

    public function index()
    {
        $this->failIfNoUser();
        $lists = TaskList::where('user_id', '=', \Auth::user()->id)->get();
        $lists2 = TaskList::where('user_id', '=', \Auth::user()->id)->lists('name', 'id');
        $lists2 = array_add($lists2, '0', 'Please select');

        return \View::make("user.dashboard")->with('lists', $lists)->with('lists2', $lists2);
    }

    public function store(Request $request)
    {
        $validator = TaskList::validate($request->all());
        if ($validator->fails()) {
            return \Redirect::to("/dashboard")->withErrors($validator)->withInput($request->all());
        } else {
            $taskList = new TaskList();
            $taskList->name = $request->get('name');
            $taskList->user_id = \Auth::user()->id;
            $taskList->save();


            return \Redirect::to("/dashboard")->with('suc_message', 'Task created successfuly!');
        }
    }

    public function destroy($id)
    {
        $this->failIfNoUser();
        $task = TaskList::find($id);
        if ($task->user_id == \Auth::user()->id) {
            $task->delete();
            return \Redirect::to("/dashboard")->with('suc_message', 'Task deleted successfuly!');
        } else {
            return \Redirect::to("/dashboard")->with('err_message', 'You can delete only your lists!');
        }
    }
}
