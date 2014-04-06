<?php

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {
	protected $collection = "users";
	public static $rules = array(
			'uid'=>'required',
			'nid'=>'required'
		);

	public static $hostnameDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');
	public static $networkDropDown = array(''=>'Select .. ','0'=>'UnBlocked','1'=>'Blocked');

	public function networks()
    {
        return $this->embedsMany('Network');
    }
}