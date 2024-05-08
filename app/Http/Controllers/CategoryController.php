<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // Get Http Method
    {
        $categories = \App\Models\Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Get Http Method
    {
        return view('admin.categories.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Post Http Method
    {
        if ($request->file('file')){
            $image = \Illuminate\Support\Facades\Storage::disk('public')
                ->put('categories/', $request->file('file'));
        }

        \App\Models\Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect(\route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = \App\Models\Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = \App\Models\Category::find($id);

        $image = $category->image;
        if ($request->file('file')) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($category->image);

            $image = \Illuminate\Support\Facades\Storage::disk('public')
                ->put('categories/', $request->file('file'));
        }

        if (array_key_exists('remove_photo', $request->all())) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($category->image);
            $image = '';
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect(\route('admin.categories.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = \App\Models\Category::find($id);

        $image_delete = \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($category->image);

        if ($image_delete){
            \App\Models\Category::destroy($id);
        }

        return redirect(\route('admin.categories.index'));

    }
}
