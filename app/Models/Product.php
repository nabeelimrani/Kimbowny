<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

    public static function find(mixed $pid)
    {
    }

    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
  public function wishlist()
  {
    return $this->belongsToMany(User::class, 'wishlists');
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
    public  function pagelink()
    {
      return "product/".str_replace(' ','-',$this->name);
    }
}
