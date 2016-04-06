<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Property extends Eloquent
{

	public function items()
	  {
	    return $this->belongsToMany('Item');
	  }


}
