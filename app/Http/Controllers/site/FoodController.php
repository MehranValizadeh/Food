<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function show($id)
    {
        $category = Category::find($id);
        return view('foods' , compact('category'));
    }


}
