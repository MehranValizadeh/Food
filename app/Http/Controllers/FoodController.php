<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('admin.foods.list' , compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.foods.store', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (app(Food::class)->getTable() == "foods") {
            $image = \Illuminate\Support\Facades\Storage::disk('public')
                ->put('foods/', $request->file('file'));
            \App\Models\Food::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);
        }


        return redirect(\route('admin.foods.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = \App\Models\Food::find($id);
        $categories = Category::all();
        return view('admin.foods.edit', compact('food' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $food = \App\Models\Food::find($id);

        $image = $food->image;
        if ($request->file('file')) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($food->image);

            $image = \Illuminate\Support\Facades\Storage::disk('public')
                ->put('foods/', $request->file('file'));
        }

        if (array_key_exists('remove_photo', $request->all())) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($food->image);
            $image = '';
        }

        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect(\route('admin.foods.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = \App\Models\Food::find($id);

        $image_delete = \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($food->image);

        if ($image_delete){
            \App\Models\Food::destroy($id);
        }

        return redirect(\route('admin.foods.index'));
    }
}
