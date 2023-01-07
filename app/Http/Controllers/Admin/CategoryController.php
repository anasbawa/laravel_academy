<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.dashboard.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->title = $request->title;
        $category->save();

        return back();
    }
}
