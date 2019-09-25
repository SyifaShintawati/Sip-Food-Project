<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;
use App\minuman;
use App\supplier;

class minumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minuman = minuman::all();
        $supplier = supplier::all();
        return view ('minuman.minuman', compact('minuman', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('minuman.formminuman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $minuman = new minuman;
        $minuman->id_supplier = $request->id_supplier;
        $minuman->nama_minuman = $request->nama_minuman;
        $minuman->harga_minuman = $request->harga_minuman;
        $minuman->stok_minuman = $request->stok_minuman;
        $minuman->save();
        return redirect('/minuman');

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
        $minuman = minuman::findOrFail($id);
        $supplier = supplier::all();

        return $minuman;
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
        $minuman = minuman::find($request->id);
        $minuman->id_supplier = $request->id_supplier;
        $minuman->nama_minuman = $request->nama_minuman;
        $minuman->harga_minuman = $request->harga_minuman;
        $minuman->stok_minuman = $request->stok_minuman;
        $minuman->save();
        return redirect('/minuman');

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
        $minuman = minuman::findOrFail($id);
        $minuman::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus.'
        ]);
    }

    public function minuman()
    {
        $minuman = minuman::with('supplier')->get();
        return Datatables::of($minuman)
            ->addColumn('action', function($minuman){
                return '<a onclick="edit('. $minuman->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $minuman->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })->addIndexColumn()->make(true);
    }
}
