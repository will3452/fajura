<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::where('id','!=',auth()->user()->id)->get();
        return view('accounts.index', compact('accounts'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'email'=>'email|required|unique:users',
            'type'=>'required'
        ]);
        User::create(['name'=>$request->name, 'password'=>Hash::make($request->password), 'email'=>$request->email, 'type'=>$request->type]);
        return back();
    }
}
