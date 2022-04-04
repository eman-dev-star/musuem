<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceId extends Model
{
    use HasFactory;
    protected $table='place_ids';
    protected $fillable =[ 'name','lang_id','place_id'];

   public $timestamps = false;
   public function places()
   {
       return $this->hasMany(Place::class);

   }//end of cityid

}
