<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $search=\request('query');


          $products=Product::with("category")->where(function ($query) use($search)
          {
            $query->where('name','like','%'.$search.'%')
              ->orWhereHas('pet', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
              });
          })->get();

      $categories=Category::with("products")->get();

      return view("client.pages.shop",compact("products","categories"));
    }
}
