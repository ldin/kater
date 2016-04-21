<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ItemImage extends Eloquent
{
    protected $table = 'item_image';

    protected $fillable = array(
        'item_id',
        'src',
        'alt',
        'text'
    );

    protected $guarded = array(
		'id',
		'deleted_at',
		'created_at',
		'updated_at',
	);

	public function post()
	{
	    return $this->belongsTo('Item');
	}

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
