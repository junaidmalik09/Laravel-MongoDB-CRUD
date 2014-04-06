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
			
			'nid_2'=>'numeric|required_with:n_name_2,n_ip_2,n_status_2',
			'n_name_2'=>'alpha_num|required_with:nid_2,n_ip_2,n_status_2',
			'n_ip_2'=>'ip|required_with:nid_2,n_name_2,n_status_2',
			'n_status_2'=>'numeric|required_with:nid_2,n_name_2,n_ip_2',
			
			'nid_3'=>'numeric',
			'n_name_3'=>'alpha_num',
			'n_ip_3'=>'ip',
			'n_status_3'=>'numeric',
			
			'hostname_1'=>'required',
			'block_1'=>'required|numeric',
			
			'hostname_2'=>'',
			'block_2'=>'numeric',
			
			'hostname_3'=>'',
			'block_3'=>'numeric'
		);

	public static $nameAttributes = array(
			'uid'=>'User ID',
			
			'nid_1'=>'First Network ID',
			'n_name_1'=>'First Network Name',
			'n_ip_1'=>'First Network IP',
			'n_status_1'=>'First Network Status',
			
			'nid_2'=>'Second Network ID',
			'n_name_2'=>'Second Network Name',
			'n_ip_2'=>'Second Network IP',
			'n_status_2'=>'Second Network Status',
			
			'nid_3'=>'Third Network ID',
			'n_name_3'=>'Third Network Name',
			'n_ip_3'=>'Third Network IP',
			'n_status_3'=>'Third Network Status',
			
			'hostname_1'=>'First Hostname',
			'block_1'=>'First Hostname Block',
			
			'hostname_2'=>'Second Hostname',
			'block_2'=>'Second Hostname Block',
			
			'hostname_3'=>'Third Hostname',
			'block_3'=>'Third Hostname Block'
		);

	public static $hostnameDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');
	public static $networkDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');

	public function networks()
    {
        return $this->embedsMany('Network');
    }
}