<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $table = 'flavor';
    protected $primaryKey = 'id';
}
