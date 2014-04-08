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
		// Fetch network and hostname count
		$networkCount = Input::get('networkCount');
		$hostnameCount = Input::get('hostnameCount');

		$rules = User::$rules;
		$nameAttributes = User::$nameAttributes;

		if ($networkCount > 1) {
			for ($i=2; $i<=$networkCount; $i++) {
				
				if (Input::get('network_check_'.$i)) {
					// Add dynamic validation rules
					$rules['nid_'.$i] = 'required|numeric';
					$rules['n_name_'.$i] = 'required|alpha_num';
					$rules['n_ip_'.$i] = 'required|ip';
					$rules['n_status_'.$i] = 'required|numeric';
					
					// Add dynamic attributes
					$nameAttributes['nid_'.$i] = 'Network ID '.$i;
					$nameAttributes['n_name_'.$i] = 'Network Name '.$i;
					$nameAttributes['n_ip_'.$i] = 'Network IP '.$i;
					$nameAttributes['n_status_'.$i] = 'Network Status '.$i;

				}

			}
		}

		if ($hostnameCount > 1) {
			for ($i=2; $i<=$hostnameCount; $i++) {
				
				if (Input::get('hostname_check_'.$i)) {
					// Add dynamic validation rules
					$rules['hostname_'.$i]='required';
					$rules['block_'.$i]='required|numeric';

					// Add dynamic attributes
					$nameAttributes['hostname_'.$i]='Hostname '.$i;
					$nameAttributes['block_'.$i]='Block '.$i;
				}
			}

		}

		

		$validator = Validator::make($data = Input::all(), $rules);
		$validator->setAttributeNames($nameAttributes); 

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$newUser = new User;
		$newUser->uid = Input::get('uid');
		
		$networks = array();
		for ($i=1; $i<=$networkCount; $i++) {
			if (Input::get('network_check_'.$i) || $i==1) {
				array_push($networks, array(
						'nid'=>Input::get('nid_'.$i),
						'n_name'=>Input::get('n_name_'.$i),
						'n_ip'=>Input::get('n_ip_'.$i),
						'n_status'=>Input::get('n_status_'.$i)
				));
			}
		}

		$hostnames = array();
		for ($i=1;$i<=$hostnameCount;$i++) {
			if (Input::get('hostname_check_'.$i) || $i==1) {
				array_push($hostnames, array(
						'hostname'=>Input::get('hostname_'.$i),
						'block'=>Input::get('block_'.$i)
					));
			}
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

		// Fetch network and hostname count
		$networkCount = Input::get('networkCount');
		$hostnameCount = Input::get('hostnameCount');

		$rules = User::$rules;
		$nameAttributes = User::$nameAttributes;

		if ($networkCount > 1) {
			for ($i=2; $i<=$networkCount; $i++) {
				
				if (Input::get('network_check_'.$i)) {
					// Add dynamic validation rules
					$rules['nid_'.$i] = 'required|numeric';
					$rules['n_name_'.$i] = 'required|alpha_num';
					$rules['n_ip_'.$i] = 'required|ip';
					$rules['n_status_'.$i] = 'required|numeric';
					
					// Add dynamic attributes
					$nameAttributes['nid_'.$i] = 'Network ID '.$i;
					$nameAttributes['n_name_'.$i] = 'Network Name '.$i;
					$nameAttributes['n_ip_'.$i] = 'Network IP '.$i;
					$nameAttributes['n_status_'.$i] = 'Network Status '.$i;
				}
			}
		}

		if ($hostnameCount > 1) {
			for ($i=2; $i<=$hostnameCount; $i++) {
				if (Input::get('hostname_check_'.$i)) {
					// Add dynamic validation rules
					$rules['hostname_'.$i]='required';
					$rules['block_'.$i]='required|numeric';

					// Add dynamic attributes
					$nameAttributes['hostname_'.$i]='Hostname '.$i;
					$nameAttributes['block_'.$i]='Block '.$i;
				}
			}

		}

		$validator = Validator::make($data = Input::all(), $rules);
		$validator->setAttributeNames($nameAttributes); 

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$networks = array();
		for ($i=1; $i<=$networkCount; $i++) {
			if (Input::get('network_check_'.$i) || $i==1) {
				array_push($networks, array(
						'nid'=>Input::get('nid_'.$i),
						'n_name'=>Input::get('n_name_'.$i),
						'n_ip'=>Input::get('n_ip_'.$i),
						'n_status'=>Input::get('n_status_'.$i)
				));
			}
		}

		$hostnames = array();
		for ($i=1;$i<=$hostnameCount;$i++) {
			if (Input::get('hostname_check_'.$i) || $i==1) {
				array_push($hostnames, array(
						'hostname'=>Input::get('hostname_'.$i),
						'block'=>Input::get('block_'.$i)
					));
			}
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