<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'word',
        'heading_id'
    ];

    public function HeadingRelation()
    {
    	return false;
    }


}
