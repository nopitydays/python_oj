<?php

namespace App\Controllers;

use App\Services\Validators\SignupValidator;
use App\Services\Validators\UserValidator;
use Illuminate\Support\Facades\Hash;
use User,User_info,User_pro_totel,User_group;
use Input,Notification,Redirect,Sentry,Str;

class UsersController extends \BaseController{

    /**
     * Display a listing of the resource.
     * GET /admin/users
     *
     * @return Response
     */
    Protected $id;

    public function __construct()
    {
        if (Sentry::check()) {
            if (Sentry::getUser()->getId() != null)
                $this->id = Sentry::getUser()->getId();
        }
        else
            $this->id = 2;
    }

    public function index()
    {
        return \View::make('users.index')->with('user',User::where('id','=',$this->id)->firstOrFail());
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/users/create
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/users
     *
     * @return Response
     */

    public function avatarUpload()
    {
        //some codes to deal with upload avatar
    }



    /**
     * Display the specified resource.
     * GET /admin/users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin/users/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */

    public function statistic()
    {
        //echo 'where user_id ='.$this->id;
        return \View::make('users.statistic')->with('user_pro_totel',User_pro_totel::where('user_id','=',$this->id)->firstOrFail());
    }

    public function edit()
    {
        return \View::make('users.edit')->with('user',User::where('id','=',$this->id)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     * PUT /admin/users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($email)
    {
        $credentials=array(
            'id'=>$this->id,
            'password'=>Input::get('password')
        );
        try {
            $user = Sentry::authenticate($credentials, false);
            if ($user)
            {
                $validation = new UserValidator;
                if ($validation->passes()) {
                    $user = User::where('id', '=', $this->id)->firstOrFail();
                    $user_info=User_info::where('user_id','=',$user->id)->firstOrFail();
                    $user->username = Input::get('username');
                    $user_info->username=Input::get('username');
                    $temp = Input::get('newpassword');
                    if ($temp != "") {
                        $user->password = Hash::make($temp);
                    }
                    $user->save();
                    $user_info->save();
                    Notification::success('更新页面成功！');

                    return Redirect::route('users.edit', User::where('id', '=', $this->id)->firstOrFail());
                }
                return Redirect::back()->withInput()->withErrors($validation->errors);
            }
        }
        catch(\Exception $e)
        {
            return Redirect::back()->withInput()->withErrors('Password not match!');
        }
    }


    public function store()
    {

        try {
            $root="/var/www/html/public/LabSYS/p_pyoj_cloud/trunk/pyoj/public/user/";
            $salt="sasfasfasfa";
            $validation = new SignupValidator;
            if ($validation->passes()) {
                $user_info = new User_info;
                $users_group=new User_group;
                $password = Input::get('password');
                $username = Input::get('username');
                $email = Input::get('email');
                $credentials=array(
                    'email'=>$email,
                    'password'=>$password,
                    'username'=>$username,
                    'activated'=>1
                );
                if (User::where('email', '=', $email)->firstOrFail()){
                    return Redirect::back()->withInput()->withErrors('邮箱已被使用!');
                }
                else if (User::where('username', '=', $username)->firstOrFail()){
                    return Redirect::back()->withInput()->withErrors('用户名已被注册!');
                }
                else {
                    $user = Sentry::register($credentials, false);
                    $user_info->username = $username;
                    $user_info->user_id = $user->id;
                    $path = substr($root . md5(((string)$user->id) . $salt), 0, -16);

                    $user_info->image = $path;

                    $res = mkdir($path, 0777, true) or die("mkdir failed!");

                    $user_info->save();

                    $users_group->user_id = $user_info->user_id;
                    $users_group->group_id = 2;
                    $users_group->save();

                    $user_pro_totel = new User_pro_totel;
                    $user_pro_totel->user_id = $user->id;
                    $user_pro_totel->ac_num = 0;
                    $user_pro_totel->totel_num = 0;
                    $user_pro_totel->save();


                    Notification::success('注册成功！');

                    return Redirect::route('home.index');
                }
            }
            return Redirect::back()->withInput()->withErrors($validation->errors);
        }
        catch(\Exception $e)
        {
            return Redirect::back()->withInput()->withErrors($e);
        }

    }





    public function wait()
    {
        return view('home.wait');
    }


    public function destroy($id)
    {
        //
    }

}
