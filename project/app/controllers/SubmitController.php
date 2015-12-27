<?php

namespace App\Controllers;

use Auth,BaseController,Form,Input,Redirect,Sentry,View,Pro_submit,User_info;

class SubmitController extends \BaseController {



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
	/**
	 * Display a listing of the resource.
	 * GET /submit
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /submit/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /submit
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /submit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return \View::make('submit.show')->with('problem_id',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /submit/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /submit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /submit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function action($id)
    {
        $Psubmit=new Pro_submit();
        $Psubmit->user_id=$this->user_id;
        $Psubmit->pro_id=$id;
        $User_info=User_info::where('user_id','=',$this->user_id)->firstOrFail();
        $path=$User_info->image;
        $Psubmit->path=$path;
        $code=Input::get('code');  // filteraaaaaa  how to get??
        $fp=fopen($path."/".$id.".py",'w') or die("Unable to open file!");
        fwrite($fp,$code);
        fclose($fp);
        $Psubmit->save();
        return \View::make('submit.result')->with('pro_submit', Pro_submit::find($Psubmit->id));
    }
}
