<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sculpture extends Model
{
    use HasFactory;
    protected $table='sculptures';

    protected $fillable = ['code','image','plce_id'];
    protected $appends=['image_path'];
   public $timestamps = false;
   public function getimagePathAttribute(){
    return asset('uploads/sculpture/'.$this->image);
}
  public function place()
{
    return $this->belongsTo(Place::class);

}//end of city

public function descrption()
{
    return $this->hasOne(Discription::class);
}

}
