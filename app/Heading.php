<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    protected $fillable = [
        'heading_name',
        'description',
        'created_by',
        'updated_by'
    ];

    public function WordsRelation()
    {
        return $this->hasMany('App\Word','heading_id','id');
    }


}
