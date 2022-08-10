<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        $service = Service::all();
        $payment = Payment::all();
        // dd($payment);
        return view('backend.payment.index',compact('payment','student','service'));
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
        $payment = Payment::all();
        return view('backend.payment.create',compact('payment','student','service'));
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
            'date'=>'required',
            'student_id'=>'required',
            'service_id'=>'required',
            'paid'=>'required',
        ]);

        $payment = new Payment();
        $payment->date = $request->date;
        $payment->student_id = $request->student_id;
        $payment->service_id = $request->service_id;
        $payment->paid = $request->paid;
        $payment -> save();
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
        $service = Service::all();
        $student = Student::all();
        $payment = Payment::find($id);
        return view('backend.payment.edit',compact('payment','student','service'));
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
            'date'=>'required',
            'student_id'=>'required',
            'service_id'=>'required',
            'paid'=>'required',

        ]);

        $payment = Payment::find($id);
        $payment->date = $request->date;
        $payment->student_id = $request->student_id;
        $payment->service_id = $request->service_id;
        $payment->paid = $request->paid;
        $payment->update();
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
        $payment = Payment::find($id);
        $payment->delete();
        session()->flash('message','Record Deleted successfully');
        return redirect()->back();

    }
}
