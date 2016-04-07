<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends Eloquent
{

	public function post()
	  {
	      return $this->belongsTo('Post');
	  }
	  
	public function properties()
	  {
	    return $this->belongsToMany('Property');
	  }
	  
	public function images()
	  {
	    return $this->hasMany('ItemImage');
	  }
  

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
