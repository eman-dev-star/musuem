<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscriptionId extends Model
{
    use HasFactory;
    protected $table='discription_ids';
    protected $fillable =[ 'text','audio','video','lang_id','discription_id'];
    public $timestamps = false;
}
