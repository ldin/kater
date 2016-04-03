<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent
{

	public function gallery()
	  {
	    return $this->hasMany('Gallery');
	  }

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
