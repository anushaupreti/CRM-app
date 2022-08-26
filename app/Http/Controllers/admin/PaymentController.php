<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
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
        $level = Level::all();
        $students = Student::all();
        $service = Service::all();
        $payment = Payment::with('student','level')
                    ->orderBy('id', 'DESC')
                    ->get();
        // dd($payment);
        return view('backend.payment.index',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $student = Student::select('students.*')
            // ->where('service_id', $request->service_id)
            ->get();
        $service =Service::select('services.*')
                // ->join('students','students.service_id','=','services.id')
                // ->where('service_id',$request->service_id)
                ->get();
        $level = Level::select('levels.*')
                // ->where('service_id',$request->service_id)
                ->get();
        $payment = Payment::select('payments.*');
            // ->DB::select(DB::raw('sum(payments.paid) as total'),'payments.paid','payments.date','payments.student_id','payments.service_id','services.name as servicename','services.price','students.name','students.email','students.mobile','students.address','students.created_at')
            // ->join('levels','levels.service_id','=','services.id')
            // ->where('')
            // ->where('levels.service_id', '=' ,$request->service_id)
            // ->get();
        return view('backend.payment.create',compact('payment','student','level'));
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
            'level_id'=>'required',
            'paid'=>'required',
        ]);

        $payment = new Payment();
        $payment->date = $request->date;
        $payment->student_id = $request->student_id;
        $payment->service_id = $request->service_id;
        $payment->level_id = $request->level_id;
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
        $level = Level::all();
        $payment = Payment::findorfail($id);
        return view('backend.payment.edit',compact('payment','student','service','level'));
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
            'level_id'=>'required',
            'paid'=>'required',
        ]);

        $payment = Payment::findorfail($id);
        $payment->date = $request->date;
        $payment->student_id = $request->student_id;
        $payment->service_id = $request->service_id;
        $payment->level_id = $request->level_id;
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
        $payment = Payment::findorfail($id);
        $payment->delete();
        session()->flash('message','Record Deleted successfully');
        return redirect()->back();
    }
}
