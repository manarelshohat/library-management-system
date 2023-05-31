<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrowed;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BorrowedController extends Controller
{

    public function index()
    {
        $borrows = Borrowed::all();
        return view("borrow.index", compact('borrows'));
    }

    public function create()
    {
        $registers = Register::all();
        $books = Book::all();
        return view("borrow.create", compact("registers", "books"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'register_id' => 'required|exists:registers,id',
            'book_id' => 'required|exists:books,id',
            'deadline_date' => 'required'

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $currentTime = Carbon::now();
        $borrow = new Borrowed();

        // $actual_return = Carbon::now();

        $borrow->register_id = $request->input('register_id');
        $borrow->book_id = $request->input('book_id');
        $borrow->borrow_date = $currentTime;
        // $borrow->actal_return_date = "waiting";
        $borrow->actal_return_date = "";

        $borrow->deadline_date = $request->input('deadline_date');


        $borrow->save();
        // dd($borrow);

        $book = $borrow->Book;
        $book->status = "borrowed";
        $book->save();
        return redirect("borrows");
    }

    public function return($id)
    {
        $actual_return = Carbon::now();

        $borrow = Borrowed::find($id);
        $book = $borrow->Book;
        $book->status = "avilable";
        $borrow->actal_return_date = $actual_return;

        $book->save();
        return redirect('borrows');
    }
}