<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('invoice_id', '!=', NULL)->get();

        return $invoices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summary()
    {
        $invoices = Invoice::all();

        $count = $invoices->count('id');
        $amount = $invoices->sum('total');

        $result = array("invoice_count" => $count, "total_invoice_amount" => $amount);

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::find($id);

        return $invoice;
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
            'price' => 'required',
            'delivery_fee' => 'required',
            'description' => 'required',
        ]);

        $invoice_id = Str::random(10).substr(date('l'), 0, 2);
        $total = $request->price + $request->delivery_fee;
        $tax = 0.06 * $total;

        $invoice = Invoice::create([
            'invoice_id' => $invoice_id,
            'price' => $request->price,
            'delivery_fee' => $request->delivery_fee,
            'description' => $request->description,
            'total' => $total,
            'tax' => $tax
        ]);

        return 'Invoice inserted successfully';
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
        //
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
