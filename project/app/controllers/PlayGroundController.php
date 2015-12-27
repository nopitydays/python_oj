<?php

namespace App\Controllers;

use Problem;
use Pro_totel, User_group;
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Notification;


class PlayGroundController extends BaseController {
    /**
     * Display a listing of the resource.
     * GET /problems
     *
     * @return Response
     */
    Protected $user_id;

    public function __construct()
    {
        if (Sentry::check()) {
            if (Sentry::getUser()->getId() != null)
                $this->user_id = Sentry::getUser()->getId();
        }
        else
            $this->user_id = 2;
    }

    public function index()
    {
        return \View::make('playground.index');
    }

    public function inter()
    {
        return \View::make('playground.inter');
    }

    public function prolist()
    {
        $problems = Problem::all();

        $group = User_group::where('user_id','=',$this->user_id)->firstOrFail();


        if($group->group_id == 1)
            $flag = true;
        else
            $flag = false;
        return \View::make('playground.prolist')->with(array('problems'=> $problems, 'flag' => $flag));
    }

    public function submit($id)
    {
        return \View::make('playground.submit')->with('problem', Problem::find($id));
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        return \View::make('playground.show')->with('problem', Problem::find($id));
    }

    public function edit($id)
    {

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        //
    }
}
