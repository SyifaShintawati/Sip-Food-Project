<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;
use App\customer;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('customer.customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('customer.formcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new customer;
        $customer->nama_customer = $request->nama_customer;
        $customer->alamat_customer = $request->alamat_customer;
        $customer->email = $request->email;
        $customer->no_telpon = $request->no_telpon;
        $customer->save();
        return redirect('/customer');

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Ditambahkan.'
        ]);
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
        $customer = customer::findOrFail($id);
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = customer::find($request->id);
        $customer->nama_customer = $request->nama_customer;
        $customer->alamat_customer = $request->alamat_customer;
        $customer->email = $request->email;
        $customer->no_telpon = $request->no_telpon;
        $customer->save();
        return redirect('/customer');
        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Diubah.'
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::findOrFail($id);
        customer::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus.'
        ]); 
    }

    public function customer(){
        $customer = customer::all();

        return Datatables::of($customer)
            ->addColumn('action', function($customer){
                return '<a onclick="edit('. $customer->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>' .
                         ' <a onclick="hapus('. $customer->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })->addIndexColumn()->make(true);
    }
}
