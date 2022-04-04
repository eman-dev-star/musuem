<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table='cities';
    // protected $fillable =[];

   public $timestamps = false;
   public function places()
    {
        return $this->hasMany(Place::class);

    }//end of places
    public function cityid()
    {
        return $this->belongsTo(CityId::class);

    }//end of cityid
    public function langs()
    {
        return $this->belongsTo(Language::class);

    }//end of cityid
}
