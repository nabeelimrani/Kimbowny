<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wegiht extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $table = 'weight';
    protected $primaryKey = 'id';
}
