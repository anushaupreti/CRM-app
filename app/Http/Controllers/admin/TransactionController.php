<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();
        // dd($transaction);
        return view('backend.transaction.index',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $service = Service::all();
        $purchase = Purchase::all();
        $payment = Payment::all();
        // $dues= Payment::where('price','-','100');
        // dd($dues);
        return view('backend.transaction.create',compact('customer','service','purchase','payment'));



        // $date = Purchase::where('days','=',8)->first();
        // $days=$date->days;

        // dd((int)$days);

        // $transaction = Transaction::all();
        // return view('backend.transaction.create',compact('customer','service','purchase','days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request ->validate([
            // 'date'=>'required',
            'customer_id'=>'required',
            'service_id'=>'required',
            'price'=>'required',
            'renew_date'=>'required',
            'expire_date'=>'required',
            // 'user_id'=>'required',

        ]);

        $transaction = new Transaction();
        // $transaction->date = $request->date;
        $transaction->customer_id = $request->customer_id;
        $transaction->service_id = $request->service_id;
        $transaction->price = $request->price;
        $transaction->renew_date = $request->renew_date;
        $transaction->expire_date = $request->expire_date;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();
        $request->session()->flash('message','Record Saved Successfully');
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
        $transaction = Transaction::find($id);
        return view('backend.transaction.edit',compact('transaction'));
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
        $request ->validate([
            // 'date'=>'required',
            'customer_id'=>'required',
            'service_id'=>'required',
            'price'=>'required',
            'renew_date'=>'required',
            'expire_date'=>'required',
            // 'user_id'=>'required',

        ]);

        $transaction = Transaction::all($id);
        // $transaction->date = $request->date;
        $transaction->customer_id = $request->customer_id;
        $transaction->service_id = $request->service_id;
        $transaction->price = $request->price;
        $transaction->renew_date = $request->renew_date;
        $transaction->expire_date = $request->expire_date;
        $transaction->user_id = auth()->user()->id;
        $transaction->update();
        $request->session()->flash('message','Record Update Successfully');
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
