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
        'deleted_at'
    ];

    public function WordsRelation()
    {
        return $this->hasMany('App\Word','heading_id','id');
    }


}
