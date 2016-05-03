<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Requests extends Eloquent
{

    protected $table = 'requests';

    protected $fillable = array(
        'email',
        'name',
        'phone',
        'text',
        'slug_for',
        'item_id',
    );

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;
}
