<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    //show all menus
    public function menuIndex()
    {
        $menuItems = Menu::all();
        return view('menuMaster', compact('menuItems'));
    }

    public function menuCreate()
    {
        return view('menuCreate');
    }

    public function menuStore(Request $request)
    {
    // Validate the form data
    $request->validate([
        'name' => 'required|max:50',
        'description' => 'required|max:1000',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required',
        'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'name.max' => 'The name field is only 50 character.',
        'description.max' => 'The description field is only 1000 character',
        'price.numeric' => 'The price field must be a numeric value.',
        'images.image' => 'The image must be a valid image file.',
        'images.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
        'images.max' => 'The image may not be greater than 2 MB.',
    ]);
        $menu = new Menu;
        $menu->name = $request->input('name');
        $menu->description = $request->input('description');
        $menu->category_id = $request->input('category_id');
        $menu->price = $request->input('price');
        $menu->quantity = $request->input('quantity');
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $menu->images = $imageName;
        }
        $menu->save();
        return redirect()->route('menu.master');
    }

    public function menuEdit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menuEdit', compact('menu'));
    }      
    
    public function menuUpdate(Request $request, $id)
    {
    // Validate the form data
    $request->validate([
        'name' => 'required|max:50',
        'description' => 'required|max:1000',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required',
        'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'name.max' => 'The name field is only 50 character.',
        'description.max' => 'The description field is only 1000 character',
        'price.numeric' => 'The price field must be a numeric value.',
        'images.image' => 'The image must be a valid image file.',
        'images.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
        'images.max' => 'The image may not be greater than 2 MB.',
    ]);
        $menu = Menu::findOrFail($id);
        $menu->name = $request->input('name');
        $menu->description = $request->input('description');
        $menu->category_id = $request->input('category_id');
        $menu->price = $request->input('price');
        $menu->quantity = $request->input('quantity');
        if ($request->hasFile('images')) {
            // Delete old image file if exists
            if ($menu->images) {
                $oldImagePath = public_path('images/' . $menu->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            // Upload new image file
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $menu->images = $imageName;
        }
        $menu->save();
        return redirect()->route('menu.master');
    }

    public function menuDestroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.master');
    }


    // Show all categories
    public function categoryIndex()
    {
        $categories = Category::all();
        return view('categoryMaster', compact('categories'));
    }

    // Show the form for creating a new category
    public function categoryCreate()
    {
        return view('categoryCreate');
    }

    // Store a newly created category in the database.
    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.master');
    }

    // Show the form for editing the specified category
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('categoryEdit',compact('category'));
    }

    // Update the specified category in the database
    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:category|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.master');
    }

    // Remove the specified category from the database
    public function categoryDestroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.master');
    }
}
