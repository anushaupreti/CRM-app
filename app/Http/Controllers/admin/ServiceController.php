<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        // return $service;
        return view('backend.services.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
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
            'name'=>'required',
            'price'=>'required',

        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->save();
        $request->session()->flash('message','Record saved successfully');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    //     $states = \DB::table('states')
    //     ->where('country_id', $request->country_id)
    //     ->get();
    
    // if (count($states) > 0) {
    //     return response()->json($states);
    // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $service = Service::find($id);
      return view('backend.services.edit',compact('service'));
    }

    public function getServices(Request $request){
        $id=$request->student_id;
        $services = Student::with('service')->where('id','=',$id)
                ->get();
                // dd($services);
                return response()->json($services);
        //   if(count($services)>0){ 
        //     }
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
            'name'=>'required',
            'price'=>'required',

        ]);
        $service = Service::find($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->update();
        $request->session()->flash('message','Record Update successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request,$id)
    {
        try{
            $service = Service::findorfail($id);
            $service->delete();
           }catch(\Exception $exception){
                $request->session()->flash('messase','Error deleting records');
                return redirect()->back();
           }
           $request->session()->flash('message','Record Deleted Successfully!!');
           return redirect()->route('service.index');
    }
}
