<?php

namespace App\Http\Controllers;

use App\Models\ManageUsers;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use App\Mail\WelcomeMail;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $manageusers = ManageUsers::latest()->paginate(15);
 
        return view('manageusers.index',compact('manageusers'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manageusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits:10'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone_number.required' => 'Phone Number is required'
        ]);

        ManageUsers::create( $validatedData);

        $email=$request->email;
        $name=$request->name;
        $user = [
            'name'=>$name,
            'email'=>$email
        ];

        dispatch(new \App\Jobs\SendEmailJob($email));
     
        return redirect()->route('manageusers.index')

                        ->with('success','Users created successfully.');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageUsers  $manageUsers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manageUsers=ManageUsers::find($id);
        //
        return view('manageusers.show',compact('manageUsers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageUsers  $manageUsers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $manageUsers=ManageUsers::find($id);

        //
        return view('manageusers.edit',compact('manageUsers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageUsers  $manageUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageUsers $manageUsers)
    {
       
        $request->validate([

            'name' => 'required',

            'email' => 'required|email',
            'phone_number' => 'required|digits:10'

        ]);

        $manageUsers->update($request->all());

        return redirect()->route('manageusers.index')

                        ->with('success','Users Updated successfully.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageUsers  $manageUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     
       $manageUsers=ManageUsers::find($id);
       $manageUsers->delete();

        return redirect()->route('manageusers.index')

                        ->with('success','users deleted successfully');
    }
}
