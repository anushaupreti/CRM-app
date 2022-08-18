<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $services = Service::all();
        $payment=DB::table('services')
        ->select(DB::raw('sum(payments.paid) as total'),'payments.paid','payments.student_id','payments.service_id','services.name as servicename','services.price','students.name','students.email','students.mobile','students.address','students.created_at')
        ->join('payments','payments.service_id','=','services.id')
        ->join('students','students.id','=','payments.student_id')
        ->groupBy('payments.student_id','payments.service_id')

        ->get();
        // dd($payment);
        // $students = DB::select('select * from students');
        // return view('backend.student.index',compact('payment','students'));
        return view('backend.student.index', [
            'payment' => $payment,
            'student' => $students,
            'service' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('backend.student.create',compact('services'));
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
            'name'=> ['required'],
            'mobile'=>['required'],
            'email'=>['required'],
            'address'=>['required'],
            'course'=>['required'],
            'total_fee'=>['required'],
        ]);
        // DB::beginTransaction();
        try{
            Student::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'address' => $request->address,
                'course' => $request->course,
                'total_fee' => $request->total_fee,
            ]);
        }catch(\Exception $exception){
            $request->session()->flash('messase','Error while adding data');
            return redirect()->back();
        }
        return redirect()->route('student.index');
        $request->session()->flash('messase','Student added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $students = Student::all();
        $services = Service::all();
        $payment=DB::table('services')
        ->select(DB::raw('sum(payments.paid) as total'),'payments.paid','payments.student_id','payments.service_id','services.name as servicename','services.price','students.name','students.email','students.mobile','students.address','students.created_at')
        ->join('payments','payments.service_id','=','services.id')
        ->join('students','students.id','=','payments.student_id')
        ->groupBy('payments.student_id','payments.service_id')
        ->where('students.id','=', $id)

        ->get();
        // dd($payment);
        // $students = DB::select('select * from students');
        // return view('backend.student.index',compact('payment','students'));
        return view('backend.student.show', [
            'payment' => $payment,
            'student' => $students,
            'service' => $services
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::findorfail($id);
        return view('backend.student.edit',compact('students'));
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
            'name'=> ['required'],
            'mobile'=>['required'],
            'email'=>['required'],
            'address'=>['required'],
            'course'=>['required'],
            'total_fee'=>['required'],
        ]);
        DB::begintransaction();
        try{
            $student = Student::findorFail($id);
            $student->name = $request->name;
            $student->mobile = $request->mobile;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->course = $request->course;
            $student->total_fee = $request->total_fee;
            $student->save();
        }catch(\Exception $exception ){
            DB::rollBack();
            $request->session()->flash('messase','Error updating records');
            return redirect()->back();
        }
        DB::commit();
        $request->session()->flash('message','Record updated successfully');
        // return view('backend.student.index');
        return redirect()->route('student.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $request)
    {
       DB::beginTransaction();
       try{
        $student = Student::findorfail($id);
        $student->delete();
       }catch(\Exception $exception){
        DB::rollBack();
        $request->session()->flash('messase','Error deleting records');
            return redirect()->back();
       }
       DB::commit();
       $request->session()->flash('message','Record Deleted Successfully!!');
       return redirect()->back();
    }
}
