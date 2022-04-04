<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discription extends Model
{
    use HasFactory;
    protected $table='discriptions';

    protected $fillable = ['sculpture_id'];
   public $timestamps = false;

    public function sculpture()
    {
        return $this->belongsTo(Sculpture::class);
    }

}
