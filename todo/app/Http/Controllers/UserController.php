<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    public function showLoginPage(Request $request) {
        return \View::make("user.login");
    }

    public function login(Request $request) {
        $validator = User::validateLogin($request->all());

        if ($validator->fails()) {
            return \Redirect::to("user/login")->withErrors($validator)->withInput($request->except("password"));
        } else {

            $input = array(
                'name' => Input::get('name'),
                'password' => Input::get('password'),
            );

            $user = new User();
            $user->name = Input::get('name');
            $user->password = Input::get('password');

            $remember = (boolean)Input::get('remember'); //'Remember me' checkbox

            if (\Auth::attempt($input, $remember, true)) {
                $user = User::find(\Auth::id());
                $user->lastLogin = \DB::raw("NOW()");
                $user->save();
                return \Redirect::to("/");
            } else {
                return \Redirect::to("user/login")->with('err_message', "There is no user with that user name or password!");
            }
        }
    }

    public function register() {
        return \View::make("user.register");
    }

    public function saveUser(Request $request) {
        $validator = User::validateRegistration($request->all());
        if ($validator->fails()) {
            return \Redirect::to("user/register")->withErrors($validator)->withInput($request->except("password"));
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = "user";
            $user->lastLogin = \DB::raw("NOW()");
            $user->suspended = false;

            $user->save();

            return \Redirect::to("user/login")->with('suc_message', 'Registration successful!');
        }

    }

    public function logout() {
        \Auth::logout();
        return \Redirect::to("user/login");
    }

    public function showAll() {
        $this->failIfNoAdmin();
        $users = User::all();
        return \View::make("admin.users")->with('users', $users);
    }

    public function destroy($id) {
        $this->failIfNoAdmin();
        $user = User::find($id);
        $user->delete();
        return \Redirect::to("/admin/users");
    }

    public function suspend($id) {
        $this->failIfNoAdmin();

        $user = User::findOrFail($id);
        $user->suspended = !$user->suspended;
        $user->save();

        return \Redirect::to("/admin/users");
    }


}
