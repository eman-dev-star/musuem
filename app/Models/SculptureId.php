<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SculptureId extends Model
{
    use HasFactory;
    protected $table='sculpture_ids';
    protected $fillable =[ 'name','lang_id','sculpture_id'];
    public $timestamps = false;

}
