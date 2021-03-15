<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = null;
        if(request()->menu == 1) {
            $appointments = Appointment::orderBy('datetime')->get();
        }else if(request()->menu == 2){
            $appointments = Appointment::where('status', 'done')->orderBy('datetime')->get();
        }else {
            $appointments = Appointment::where('status', '!=', 'done')->orderBy('datetime')->get();
        }
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'attendee_name'=>'required',
            'attendee_gender'=>'required',
            'attendee_address'=>'required',
            'services_id'=>'required',
            'attendee_email'=>'required',
            'attendee_mobile'=>'required',
            'datetime'=>'required',
        ]);
        $services_id = explode(',', $request->services_id);
        unset($validated['services_id']);
        $validated['status'] = 'inlined';
        $appointment = Appointment::create($validated);
        $appointment->services()->attach($services_id);
        alert()->success('Done!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
