<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'books_num' => 'required'

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->books_num = $request->input('books_num');


        $category->save();
        return redirect('categories');
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect('categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact("category"));
    }

    public function  update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'books_num' => 'required'


        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->books_num = $request->input('books_num');

        $category->update();

        return redirect("categories");
    }
}
