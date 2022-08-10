<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();

        return view('backend.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $service = Service::all();
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'name'=> 'required',
           'mobile'=> 'required',
           'email'=> 'required',
           'company'=> 'required',
           'address'=> 'required',
           'company_contact'=> 'required',
           'contact_person'=> 'required',
           'contact_person_mobile'=> 'required',
       ]);

       $customer = new Customer();
       $customer->name = $request->name;
       $customer->mobile = $request->mobile;
       $customer->email = $request->email;
       $customer->company = $request->company;
       $customer->address = $request->address;
       $customer->company_contact = $request->company_contact;
       $customer->contact_person = $request->contact_person;
       $customer->contact_person_mobile = $request->contact_person_mobile;
       $customer->save();
       $request->session()->flash('message','Record saved successfully');
        return redirect()->back();

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
        $customer = Customer::find($id);
        return view('backend.customer.edit',compact('customer'));
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
            'name'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'company'=> 'required',
            'address'=> 'required',
            'company_contact'=> 'required',
            'contact_person'=> 'required',
            'contact_person_mobile'=> 'required',


        ]);
       $customer = Customer::find($id);
       $customer->name = $request->name;
       $customer->mobile = $request->mobile;
       $customer->email = $request->email;
       $customer->company = $request->company;
       $customer->address = $request->address;
       $customer->company_contact = $request->company_contact;
       $customer->contact_person = $request->contact_person;
       $customer->contact_person_mobile = $request->contact_person_mobile;
       $customer -> save();
       $request->session()->flash('message','Record update successfully');
        return redirect()->back();
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
