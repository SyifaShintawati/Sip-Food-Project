<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;
use App\makanan;
use App\supplier;

class makananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanan = makanan::all();
        $supplier = supplier::all();
        return view('makanan.makanan', compact('makanan', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makanan.formmakanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $makanan = new makanan;
        $makanan->id_supplier = $request->id_supplier;
        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->harga_makanan = $request->harga_makanan;
        $makanan->stok_makanan = $request->stok_makanan;
        $makanan->save();
        return redirect('/makanan');

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
        $makanan = makanan::findOrFail($id);
        $supplier = supplier::all();
        return $makanan;
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
        $makanan = makanan::find($request->id);
        $makanan->id_supplier = $request->id_supplier;
        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->harga_makanan = $request->harga_makanan;
        $makanan->stok_makanan = $request->stok_makanan;
        $makanan->save();
        return redirect('/makanan');

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
        $makanan = makanan::findOrFail($id);
        $makanan::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus.'
        ]);
    }

    public function makanan(){
        $makanan = makanan::with('supplier')->get();
        return Datatables::of($makanan)
            ->addColumn('action', function($makanan){
                return '<a onclick="edit('. $makanan->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $makanan->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })->addIndexColumn()->make(true);
    }
}
