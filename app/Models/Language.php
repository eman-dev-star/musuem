<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';

    protected $fillable = [
        'language', 'code'
           ];
   public $timestamps = false;
   public function city()
    {
        return $this->hasMany(City::class);

    }//end of cityid

}
