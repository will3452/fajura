<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index', ['services'=>Service::get()]);
    }

    public function store(){
        $validated = request()->validate([
            'fee'=>'required',
            'name'=>'required',
            'description'=>'',
            'picture'=>'required'
        ]);
        $validated['picture'] = request()->picture->store('/public/picture');
        Service::create($validated);
        alert()->success('Service Added');
        return back();
    }

    
}
