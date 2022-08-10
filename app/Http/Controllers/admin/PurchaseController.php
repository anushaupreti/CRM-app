<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchase::all();
        $student = Student::all();
        $service = Service::all();
        return view('backend.purchase.index',compact('purchase','student','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();
        $service = Service::all();
        return view('backend.purchase.create',compact('student','service'));
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
            'student_id'=>'required',
            'service_id'=>'required',
            // 'paid'=>'required|numeric',
            'days'=>'required',


        ]);
            $purchase = new Purchase();
            $d=$request->days;
            // $intd=(int)$d;
            $fdate=$request->date;
            $date = Carbon::createFromFormat('Y-m-d', $fdate);
            // $date = $date->addDays($d);
            // $d= date('Y-m-d', strtotime($request->date. ' + date'));
            // dd($date);
            $purchase->student_id = $request->student_id;
            $purchase->service_id = $request->service_id;
            $purchase->days = $date->addDays($d);
            $purchase->save();
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
        $student = Student::all();
        $service = Service::all();
        $purchase = Purchase::find($id);
        return view('backend.purchase.edit',compact('purchase','customer','service'));
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
            'student_id'=>'required',
            'service_id'=>'required',
            // 'paid'=>'required',
            'days'=>'required',


        ]);
            $purchase =  Purchase::find($id);
            $purchase->student_id = $request->student_id;
            $purchase->service_id = $request->service_id;
            // $purchase->paid = $request->paid;
            $purchase->days = $request->days;
            $purchase->update();
            $request->session()->flash('message','Record updated successfully');
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
        $purchase = Purchase::all();
        $purchase -> delete();
        session()->flash('message','Record Deleted successfully');
        return redirect()->back();

    }
}
