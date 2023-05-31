<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::simplePaginate(6);
        return view('book.index', compact('books'));
    }
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view("book.create", compact("categories", "authors"));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books|max:30',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required',
            'rate' => 'required|integer|between:1,5'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = time() . '-' . $request->name . '.' .
            $request->img->extension();
        $request->img->move(public_path('img'), $imageName);



        $book = new Book();
        $book->name = $request->input('name');
        $book->img = $imageName;
        $book->author_id = $request->input('author_id');
        $book->category_id = $request->input('category_id');
        $book->description = $request->input('description');
        $book->price = $request->input('price');
        $book->rate = $request->input('rate');
        $book->status = "avilable";



        $book->save();
        return redirect("books");
    }

    public function delete($id)
    {
        Book::find($id)->delete();
        return redirect('books');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('book.edit', compact("book", "categories", "authors"));
    }

    public function  update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books|max:30',
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required',
            'rate' => 'required|integer|between:1,5'

        ]);

        $book = Book::find($id);

        $imageName = time() . '-' . $request->name . '.' .
            $request->img->extension();
        $request->img->move(public_path('img'), $imageName);

        $book->name = $request->input('name');
        $book->img = $imageName;
        $book->author_id = $request->input('author_id');
        $book->category_id = $request->input('category_id');
        $book->description = $request->input('description');
        $book->price = $request->input('price');
        $book->rate = $request->input('rate');
        $book->status = "avilable";

        $book->update();
        return redirect("books");
    }

    // public function updateBookStatus($id, $status)
    // {
    //     $book = Book::find($id);
    //     $book->status = $status;
    //     if ($status == "borrowed") {
    //         $book->borrowed_date = DB::raw('CURRENT_DATE');
    //     } else if ($status == "return") {
    //         $book->return_date = DB::raw('CURRENT_DATE');
    //     }
    //     $book->save();
    // }
}