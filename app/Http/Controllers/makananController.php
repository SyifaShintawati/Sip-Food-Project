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
        $input = $request->all();
        $input['foto'] = null;

        if ($request->hasFile('foto')){
            $input['foto'] = '/upload/fotomakanan/'.str_slug($input['nama_makanan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/fotomakanan/'), $input['foto']);
        }

        makanan::create($input);

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
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $makanan = makanan::findOrFail($id);

        $input['foto'] = $makanan->foto;

        if ($request->hasFile('foto')){
            if (!$makanan->foto == NULL){
                unlink(public_path($makanan->foto));
            }
            $input['foto'] = '/upload/fotomakanan/'.str_slug($input['nama_makanan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/fotomakanan/'), $input['foto']);
        }

        $makanan->update($input);

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
            ->addColumn('fotos', function($makanan){
                if ($makanan->foto == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($makanan->foto) .'">';
            })
            ->addColumn('action', function($makanan){
                return '<a onclick="edit('. $makanan->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $makanan->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['fotos', 'action'])->addIndexColumn()->make(true);
    }
}
