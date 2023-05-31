<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {

        $registers = Register::simplePaginate(5);
        return view('register.index', compact('registers'));
    }
    public function create()
    {
        return view("register.create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'email' => 'required|unique:registers',
            'code' => 'required|unique:registers',
            'phone' => 'required|unique:registers|max:11',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required|max:50',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $register = new Register();


        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->code = $request->input('code');
        $register->phone = $request->input('phone');
        $register->birthday = $request->input('birthday');
        $register->gender = $request->input('gender');
        $register->address = $request->input('address');


        $register->save();
        return redirect('registers');
    }

    public function delete($id)
    {
        Register::find($id)->delete();
        return redirect('registers');
    }

    public function edit($id)
    {
        $register = Register::find($id);
        return view('register.edit', compact("register"));
    }

    public function  update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'email' => 'required|unique:registers',
            'code' => 'required|unique:registers',
            'phone' => 'required|unique:registers|max:11',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required|max:50',

        ]);
        $register = Register::find($id);

        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->code = $request->input('code');
        $register->phone = $request->input('phone');
        $register->birthday = $request->input('birthday');
        $register->gender = $request->input('gender');
        $register->address = $request->input('address');
        $register->update();
        return redirect('registers');
    }
}
