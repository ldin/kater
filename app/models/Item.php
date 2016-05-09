<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends Eloquent
{
	//массовое заполнение
	protected $fillable = array(
		'post_id',
		'slug',
		'name',
		'title',
		'preview',
		'text',
		'parent',
		'tags',
		'image',
		'guests',
		'price',
		'status',
		'order',
		'tags',
		'seo_description',
		'seo_keywords',
	);

	//ограничение заполнения
	protected $guarded = array(
		'id',
		'deleted_at',
		'created_at',
		'updated_at',
	);

	public static $rules = array(
		'name' => 'required|min:3|max:255',
		'title' => 'required|min:3|max:255',
		'slug'  => 'required|min:4|max:255|alpha_dash|unique:items,slug,:id',
    );

	public static function rules ($id=0, $merge=[]) {
		return array_merge(
		[
			'name' => 'required|min:3|max:255',
			'title' => 'required|min:3|max:255',
			'slug'  => 'required|min:4|max:255|alpha_dash|unique:items,slug'. ($id ? ",$id" : ''),
        ],
        $merge);
	}

	public function post()
	  {
	      return $this->belongsTo('Post');
	  }
	  
	public function properties()
	  {
	    return $this->belongsToMany('Property')->withPivot('text');
	  }

	public function images()
	  {
	    return $this->hasMany('ItemImage');
	  }
  

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
