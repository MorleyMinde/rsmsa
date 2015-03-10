<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

/**
	 * Show the form for creating a new resource.
	 *
     * @param  int  $id
	 * @return Response
	 */
	public function apps($id)
	{
		$user = User::find($id);
        return  UserApps::where('user_id',$id)->get();
	}

/**
	 * Show the form for creating a new resource.
	 *
    * @param  int  $id
	 * @return Response
	 */
	public function areas($id)
	{
        $user = User::find($id);
        return  UserAreas::where('user_id',$id)->get();
	}

/**
	 * Show the form for creating a new resource.
	 *
     * @param  int  $id
	 * @return Response
	 */
	public function logs($id)
	{
        return  Logs::where('user_id',$id)->get();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = User::create(array(
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'phone' => Input::get('phone'),
            'password' => Hash::make(Input::get('password')),
            'level' => Input::get('level'),
            'role' => Input::get('role'),
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'middle_name' => Input::get('middle_name'),
            'gender' => Input::get('gender'),
            'company' => Input::get('company'),
            'rank_no' => (Input::has('rank_no'))?Input::get('rank_no'):'',
        ));
        foreach(Input::get('apps') as $apps) {
            UserApps::create(array(
                'user_id' => $user->id,
                'app_id' => $apps,
            ));
        }
        if(Input::get('level') == 'Regions' || Input::get('level') == 'Districts' ){
            foreach(Input::get('area') as $area) {
                UserAreas::create(array(
                   'user_id' => $user->id,
                   'area_id' => $area,
                   'type' => 'entry'
                ));
            }
            foreach(Input::get('area1') as $area) {
                UserAreas::create(array(
                   'user_id' => $user->id,
                   'area_id' => $area,
                   'type' => 'report'
                ));
            }
        }

        $name = $user->first_name." ".$user->last_name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Add user named ".$name
        ));
        return $user;

	}


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show()
	{
        return Auth::user();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->middle_name = Input::get('middle_name');
        $user->gender = Input::get('gender');
        $user->company = Input::get('company');
        $user->rank_no = Input::get('rank_no');
        $user->entry_area = Input::get('entry_area');
        $user->report_area = Input::get('report_area');
	}


	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
	}


}
