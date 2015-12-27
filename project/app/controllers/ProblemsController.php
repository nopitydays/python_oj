<?php

namespace App\Controllers;

use Problem;
use Pro_totel, User_group;
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Notification;

use App\Services\Validators\ProblemValidator;

class ProblemsController extends \BaseController {

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
        else {
            $this->user_id = 2;
            return Redirect::route('login');
        }
    }

	public function index()
	{
		//
		$problems = Problem::all();
		
		$group = User_group::where('user_id','=',$this->user_id)->firstOrFail();

		
		if($group->group_id == 1)
			$flag = true;
		else
			$flag = false;
		return \View::make('problems.index')->with(array('problems'=> $problems, 'flag' => $flag));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /problems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return \View::make('problems.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /problems
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validation = new ProblemValidator;
 
        if ($validation->passes())
        {
						$problem          = new Problem;
						$problem->title   = Input::get('title');
						$problem->level   = Input::get('level');
						$problem->tag     = Input::get('tag');
						$problem->content = Input::get('content');
						$problem->input   = Input::get('input');
						$problem->output  = Input::get('output');
            			$problem->save();

						$pro          	= new Pro_totel;
						$pro->pro_id   	= $problem->id;
						$pro->ac_num   	= 0;
						$pro->totel_num	= 0;
            			$pro->save();
 
            Notification::success('新增页面成功！');
 
            return Redirect::route('problems.edit', $problem->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	/**
	 * Display the specified resource.
	 * GET /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		return \View::make('problems.show')->with('problem', Problem::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /problems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		return \View::make('problems.edit')->with('problem', Problem::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$validation = new ProblemValidator;

        if ($validation->passes())
        {
						$problem          = Problem::find($id);
						$problem->title   = Input::get('title');
						$problem->level   = Input::get('level');
						$problem->tag     = Input::get('tag');
						$problem->content = Input::get('content');
						$problem->input   = Input::get('input');
						$problem->output  = Input::get('output');
            $problem->save();

            Notification::success('更新页面成功！');

            return Redirect::route('problems.edit', $problem->id);
        }

        return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$pro	 = Pro_totel::find($id);
		$pro->delete();
		$problem = Problem::find($id);
		$problem->delete();

        Notification::success('删除成功！');
        return Redirect::route('problems.index');
	}

}
