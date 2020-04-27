<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\Contact;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id = $request->id;
        $contact_id = $request->contact; 

        $request->validate([
            'name' => 'required|unique:phones,name,'.$id.',id,contact_id,'.$contact_id,
            'street' => 'required',
        ]);

        $phone = new Phone();
        $phone->name = $request->name;
        $phone->number = $request->number;
        $phone->contact_id = $request->contact;

        $phone->save();
        return redirect()->route('phonelist', [$request->contact])
                        ->with('success','Address created successfully.');
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
        $phone = Phone::with('contact')->find($id);
        return view('phone.edit',compact('phone'));
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
        $request->validate([
            'name' => 'required',
            'number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'contact' => 'required'
        ]);
        $phone = Phone::find($id);
        $phone->name = $request->name;
        $phone->number = $request->number;
        $phone->contact_id = $request->contact;

        $phone->save(); 
        return redirect()->route('phonelist', [$request->contact])
                        ->with('success','Phone Edited successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);
        $phone->delete();
        return redirect()->back()
                        ->with('success','Phone Deleted successfully');
    }

    public function phonelist($id){
        $phones = Phone::where('contact_id', $id)->get();
        $contact = Contact::find($id);
        return view('phone.list', compact('phones','contact'));
    }
}
