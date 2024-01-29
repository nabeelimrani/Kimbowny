<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
  public function pagelink()
  {
    return "pet/" . strtolower(str_replace(' ', '-', $this->name));
  }
}
