<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Contact;

class AddressController extends Controller
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
        return view('address.create');

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
            'name' => 'required|unique:addresses,name,'.$id.',id,contact_id,'.$contact_id,
            'street' => 'required',
            'contact' => 'required|numeric',
            'city' => 'required',
            'street' => 'required',
            'zip' => 'required',
            'country' => 'required'
         ]);

        $address = new Address();
        $address->name = $request->name;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->country = $request->country;
        $address->contact_id = $request->contact;
        $address->save();
        return redirect()->route('addresslist', [$request->contact])
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
        $address = Address::with('contact')->find($id);
        return view('address.edit',compact('address'));
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
            'street' => 'required',
        ]);
        $address = Address::find($id);
        $address->name = $request->name;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->country = $request->country;
        $address->contact_id = $request->contact;
        $address->save(); 
        return redirect()->route('addresslist', [$request->contact])
                        ->with('success','Address Edited successfully.');     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()
                        ->with('success','Address Deleted successfully');
    }


    public function addresslist($id){
        $addresses = Address::where('contact_id', $id)->get();
        $contact = Contact::find($id);
        return view('address.list', compact('addresses','contact'));
    }
}
