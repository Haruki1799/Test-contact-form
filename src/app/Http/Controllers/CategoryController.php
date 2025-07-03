<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }
    // public function confirm(Request $request)
    // {
    //     $category = Category::create([
    //         'content' => $request->input('content'),
    //     ]);

    //     return view('confirm', ['category' => $category]);
    // }
    // public function confirm(Request $request)
    // {
    //     $category = Category::create([
    //         'content' => $request->input('content'),
    //     ]);

    //     return view('confirm', ['category' => $category]);
    // }
}
