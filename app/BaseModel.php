<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class BaseModel extends Model 
{
    public function delete()
    {
        $this->deleted_by = Auth::id();
        $this->save();
        return parent::delete();
    }

    public function update(array $data = [], array $options = [])
    {
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        return parent::update($data, $options);
    }

    public static function create(array $data = [])
    {
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        return static::query()->create($data);
    }
}