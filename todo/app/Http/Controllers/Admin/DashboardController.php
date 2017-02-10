<?php

namespace App\Http\Controllers\Admin;

use App\TaskList;
use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $this->failIfNoAdmin();
        $totalUsers = User::count();
        $totalLists = TaskList::count();
        return \View::make("admin.dashboard")->with('totalUsers', $totalUsers)->with('totalLists', $totalLists);
    }
}
