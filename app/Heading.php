<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Heading extends BaseModel
{

    use SoftDeletes;
    protected $fillable = [
        'heading_name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function WordsRelation()
    {
        return $this->hasMany('App\Word','heading_id','id');
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
