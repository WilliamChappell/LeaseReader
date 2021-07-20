<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends BaseModel
{
	use SoftDeletes;
    protected $fillable = [
        'word',
        'heading_id',
        'created_by',
        'deleted_by',
        'deleted_at'
    ];

    public function HeadingRelation()
    {
    	return $this->hasOne('App\Heading', 'id', 'heading_id');
    }

    public function CreatedByRelation()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function UpdatedByRelation()
    {
        return $this->hasOne('App\User','id','updated_by');
    }

    public function DeletedByRelation()
    {
        return $this->hasOne('App\User','id','deleted_by');
    }

}
