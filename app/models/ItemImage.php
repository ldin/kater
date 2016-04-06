<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ItemImage extends Eloquent
{
    protected $table = 'item-image';

	public function post()
	{
	    return $this->belongsTo('Item');
	}

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
