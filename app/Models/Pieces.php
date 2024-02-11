<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieces extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $table = 'pieces';
    protected $primaryKey = 'id';
}
