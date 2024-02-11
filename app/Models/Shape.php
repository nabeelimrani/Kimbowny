<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $table = 'shape';
    protected $primaryKey = 'id';
}
