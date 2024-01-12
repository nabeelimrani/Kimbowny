<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
     public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
      public function category()
    {
        return $this->belongsTo(Category::class);
    }
   public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
