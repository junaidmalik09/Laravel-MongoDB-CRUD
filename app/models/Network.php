<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Network extends Eloquent {
	public static $unguarded = true;
	protected $collection = "networks";
}