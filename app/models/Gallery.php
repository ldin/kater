<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Gallery extends Eloquent
{

	public function post()
	{
	    return $this->belongsTo('Post');
	}

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
