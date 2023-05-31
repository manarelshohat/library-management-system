<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view("author.index", compact('authors'));
    }
    public function create()
    {

        return view("author.create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',


        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = time() . '-' . $request->name . '.' .
            $request->img->extension();
        $request->img->move(public_path('img'), $imageName);

        $author = new Author();

        $author->name = $request->input('name');
        $author->img = $imageName;
        $author->brief = $request->input('brief');

        $author->save();
        return redirect("authors");
    }

    public function delete($id)
    {
        Author::find($id)->delete();
        return redirect('authors');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('author.edit', compact("author"));
    }

    public function  update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',


        ]);


        $author = Author::find($id);

        $imageName = time() . '-' . $request->name . '.' .
            $request->img->extension();
        $request->img->move(public_path('img'), $imageName);

        $author->name = $request->input('name');
        $author->img = $imageName;
        $author->brief = $request->input('brief');

        $author->update();
        return redirect("authors");
    }
}