<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent
{

	public function galleries()
	  {
	    return $this->hasMany('Gallery');
	  }
	public function items()
	{
		return $this->hasMany('Item')->orderBy('order', 'ASC');
	}

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
