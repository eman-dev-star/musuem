<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $table='places';
    protected $fillable = ['image','city_id'];
    protected $appends=['image_path'];
    public $timestamps = false;
    public function city()
    {
        return $this->belongsTo(City::class);

    }//end of city
    public function placeid()
    {
        return $this->belongsTo(PlaceId::class)->select('name');

    }//end of cityid
    public function sculptures()
    {
        return $this->hasMany(Sculpture::class);

    }//end of Sculpture
    public function getimagePathAttribute(){
        return asset('uploads/places/'.$this->image);
    }

}
