<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityId extends Model
{
    use HasFactory;
    protected $table='city_ids';
    protected $fillable =['name','lang_id','city_id'];
   public $timestamps = false;
   public function city()
    {
        return $this->hasMany(City::class);

    }//end of cityid


}
