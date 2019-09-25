<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;
use App\supplier;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('supplier.supplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('supplier.formsupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telpon = $request->no_telpon;
        $supplier->save();
        return redirect('/supplier');

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
        $supplier = supplier::findOrFail($id);
        return $supplier;
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
        $supplier = supplier::find($request->id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telpon = $request->no_telpon;
        $supplier->save();
        return redirect ('/supplier');

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
        $supplier = supplier::findOrFail($id);
        $supplier::destroy($id);
        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus.'
        ]);
    }

    public function supplier(){
        $supplier = supplier::all();

        return Datatables::of($supplier)
            ->addColumn('action', function($supplier){
                return '<a onclick="edit('. $supplier->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $supplier->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })->addIndexColumn()->make(true);
    }
}
