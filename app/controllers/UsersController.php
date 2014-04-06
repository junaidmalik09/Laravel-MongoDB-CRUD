<?php
use Jenssegers\Mongodb\Model as Eloquent;
class UsersController extends BaseController {

	//Test for git
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);
		$validator->setAttributeNames(User::$nameAttributes); 

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$newUser = new User;
		$newUser->uid = Input::get('uid');
		$networks = array();
		if (Input::get('nid_1') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_1'),
					'n_name'=>Input::get('n_name_1'),
					'n_ip'=>Input::get('n_ip_1'),
					'n_status'=>Input::get('n_status_1')
				));
		}

		if (Input::get('nid_2') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_2'),
					'n_name'=>Input::get('n_name_2'),
					'n_ip'=>Input::get('n_ip_2'),
					'n_status'=>Input::get('n_status_2')
				));
		}

		if (Input::get('nid_3') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_3'),
					'n_name'=>Input::get('n_name_3'),
					'n_ip'=>Input::get('n_ip_3'),
					'n_status'=>Input::get('n_status_3')
				));
		}

		$hostnames = array();
		if (Input::get('hostname_1') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_1'),
					'block'=>Input::get('block_1')
				));
		}

		if (Input::get('hostname_2') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_2'),
					'block'=>Input::get('block_2')
				));
		}

		if (Input::get('hostname_3') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_3'),
					'block'=>Input::get('block_3')
				));
		}
		$newUser->networks = $networks;
		$newUser->hostnames = $hostnames;
		$newUser->save();
		return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$user = User::findOrFail($id);
		$validator = Validator::make($data = Input::all(), User::$rules);
		$validator->setAttributeNames(User::$nameAttributes); 

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$networks = array();
		if (Input::get('nid_1') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_1'),
					'n_name'=>Input::get('n_name_1'),
					'n_ip'=>Input::get('n_ip_1'),
					'n_status'=>Input::get('n_status_1')
				));
		}

		if (Input::get('nid_2') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_2'),
					'n_name'=>Input::get('n_name_2'),
					'n_ip'=>Input::get('n_ip_2'),
					'n_status'=>Input::get('n_status_2')
				));
		}

		if (Input::get('nid_3') != '') {
			array_push($networks, array(
					'nid'=>Input::get('nid_3'),
					'n_name'=>Input::get('n_name_3'),
					'n_ip'=>Input::get('n_ip_3'),
					'n_status'=>Input::get('n_status_3')
				));
		}

		$hostnames = array();
		if (Input::get('hostname_1') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_1'),
					'block'=>Input::get('block_1')
				));
		}

		if (Input::get('hostname_2') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_2'),
					'block'=>Input::get('block_2')
				));
		}

		if (Input::get('hostname_3') != '') {
			array_push($hostnames, array(
					'hostname'=>Input::get('hostname_3'),
					'block'=>Input::get('block_3')
				));
		}
		$user->networks = $networks;
		$user->hostnames = $hostnames;
		$user->save();

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}