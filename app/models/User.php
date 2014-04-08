<?php

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {
	protected $collection = "users";
	public static $rules = array(
			'uid'=>'required',
			
			'nid_1'=>'required|numeric',
			'n_name_1'=>'required|alpha_num',
			'n_ip_1'=>'required|ip',
			'n_status_1'=>'required|numeric',
			
			'hostname_1'=>'required',
			'block_1'=>'required|numeric',
			
		);

	public static $nameAttributes = array(
			'uid'=>'User ID',
			
			'nid_1'=>'First Network ID',
			'n_name_1'=>'First Network Name',
			'n_ip_1'=>'First Network IP',
			'n_status_1'=>'First Network Status',
			
			'hostname_1'=>'First Hostname',
			'block_1'=>'First Hostname Block',
			
			
		);

	public static $hostnameDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');
	public static $networkDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');

	public function networks()
    {
        return $this->embedsMany('Network');
    }
}