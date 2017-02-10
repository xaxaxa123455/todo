<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function failIfNoAdmin() {
        if (\Auth::user() == null || \Auth::user()->type !== 'admin') {
            die(  \View::make("errors.403") );
        }
    }

    public function failIfNoUser() {
        if (\Auth::user() == null || \Auth::user()->type !== 'user') {
            die(  \View::make("errors.403") );
        }
    }
}
