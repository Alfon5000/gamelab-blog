<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $categories = Category::where('name', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $categories = Category::paginate(5);
        }
        $count = $categories->count();
        return view('categories.index', compact('categories', 'count'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        Category::create(['name' => $name]);
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }
}
