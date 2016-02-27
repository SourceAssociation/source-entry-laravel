<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EntryUser as User;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator as VValidator;

class AuthController extends Controller
{
    protected $loginPath = '/auth/login';
    protected $redirectPath = '/center';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
            "name.required"=> ":attribute : 不能为空",
            "name.min"=> ":attribute : 不能小于2个字",
            "name.max"=> ":attribute : 不能超过50个字",
            "email.required"=>":attribute : 不能为空",
            "email.unique"=>":attribute : 已被注册",
            "email.max"=>":attribute : 不能超过255个字",
            "password.required"=>":attribute : 不能为空",
            "password.confirmed"=>":attribute : 两次输入的密码不一致",
            "password.min"=> ":attribute : 不能小于6位",
        );

        $attributes = array(
            "name" => '名字',
            'email' => '邮箱',
            'password' => '密码'
        );

        return Validator::make($data, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|max:255|unique:entry_users',
            'password' => 'required|confirmed|min:6',
        ], $message, $attributes);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        $results['error'] = 1004;
        $results['msg'] = '用户名或密码错误！';
        return response()->json($results);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $results['error'] = 1002;
            $results['msg'] = $this->formatValidationErrors($validator);
            return response()->json($results);
        }else{
            Auth::login($this->create($request->all()));
            return redirect($this->redirectPath());
        }

    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    protected function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Format the validation errors to be returned.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return array
     */
    protected function formatValidationErrors(VValidator $validator)
    {
        $errors = $validator->errors()->getMessages();
        $results = [];
        $i = 0;
        foreach ($errors as $key => $value) {
            $results[$i]['key'] = $key;
            $results[$i]['value'] = $value[0];
            $i++;
        }
        return $results;
    }
}
