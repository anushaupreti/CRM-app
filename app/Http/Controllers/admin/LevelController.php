<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $service= Service::all();
        return view('backend.level.index',compact('levels','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::all();
        return view('backend.level.create',compact('service'));
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
            'service_id'=>['required'],
            'level_name' => ['required'],
            'start_date'=>['required'],
            'end_date'=>['required'],
            'duration'=>['required'],
            'price'=>['required'],
        ]);
        DB::beginTransaction();
            try{
                $levels = new Level();
                $levels->service_id = $request->service_id;
                $levels->level_name = $request->level_name;
                $levels->start_date = $request->start_date;
                $levels->end_date = $request->end_date;
                $levels->duration = $request->duration;
                $levels->price = $request->price;
                $levels->save();
                // dd($level);

            }catch(\Exception $exception){
                $request->session()->flash('Message','Error Adding Level');
                return redirect()->back();
            }
        return redirect()->route('level.index');
        $request->session()->flash('message','Level Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::all();
        $levels = Level::findorfail($id);
        return view('backend.level.edit',compact('levels','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_id'=>['required'],
            'level_name' => ['required'],
            'start_date'=>['required'],
            'end_date'=>['required'],
            'duration'=>['required'],
            'price'=>['required'],
        ]);
        DB::begintransaction();
        try{
            $levels = Level::findorFail($id);
            $levels->service_id = $request->service_id;
            $levels->level_name = $request->level_name;
            $levels->start_date=$request->start_date;
            $levels->end_date=$request->end_date;
            $levels->duration=$request->duration;
            $levels->price=$request->price;
            $levels->update();
        }catch(\Exception $exception){
            $request->session()->flash('Message','Error Updating Level');
            return redirect()->back();
        }
        return redirect()->route('level.index');
        $request->session()->flash('message','Level Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $request)
    {
        DB::beginTransaction();
       try{
        $level = Level::findorfail($id);
        $level->delete();
       }catch(\Exception $exception){
        DB::rollBack();
        $request->session()->flash('messase','Error deleting records');
            return redirect()->back();
       }
       DB::commit();
       $request->session()->flash('message','Record Deleted Successfully!!');
       return redirect()->route('level.index');
    }
}
