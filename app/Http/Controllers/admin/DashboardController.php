<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Dashboard;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payment=Payment::all();
        $expiredate=Purchase::all();

      $now=\Carbon\Carbon::now();




        $details=DB::table('payments')
        ->join('customers','customers.id','=','payments.customer_id')
        ->join('services','services.id','=','payments.service_id')
        ->select('customers.name as customername','payments.paid as paid',
        'services.name as servicename','services.id as serviceid','services.price as price'
        ,DB::raw('SUM(paid) as totalpaid'))
        ->groupBy('service_id','customer_id')
        ->get();



        // $total=0;
        // foreach($customer_id as $cid)
        // {
        //  $total +=$cid->paid;
        // }
        // foreach($payment as $p)
        // {
        //     // dump($p->id);
        //    $service=Service::where('id',$p->service_id)->first();
        // //    return $service;

        //    $paid=Payment::where('service_id',$service->id)->first();
        //    $serviceprice=$service->price;
        //    $amountpaid=$paid->paid;
        //    $due=$serviceprice-$amountpaid;
        //    dd($due);


        // }
        $dashboard = Dashboard::all();
        $customer = Customer::all();
        $service= Service::all();
        $purchase= Purchase::all();
        $payment = Payment::all();
        $transaction = Transaction::all();

        // $dues = DB::table('services')
        //          ->select('price', DB::raw('count(*) as total'))
        //          ->groupBy('price')
        //          ->get('id');
        // $amount = DB::table('services')->where('id','1')->pluck('price','name','service')->sum();
        // $payment = DB::table('payments')->pluck('paid')->sum();
        // $balance = $amount - $payment;

        // $amount = DB::table('services')->where('price')->get();
        // $payment = DB::table('payments')->where('paid')->get();
        // $dues = $amount - $payment;
        // dd($balance);
        return view('backend.dashboard.index',compact('dashboard','service','purchase','payment','customer','transaction','details','now'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
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
    // public function edit($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $dashboard = Dashboard::all();
        $customer = Customer::all();
        $service= Service::all();
        $purchase= Purchase::find($id);
        $payment = Payment::all();
        $transaction = Transaction::all();

        return view('backend.dashboard.edit',compact('dashboard','customer','service','purchase','payment','transaction'));
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
        //
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
