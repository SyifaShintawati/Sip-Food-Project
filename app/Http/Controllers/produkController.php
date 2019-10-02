<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;

use App\kategori;
use App\produk;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::all();
        $kategori = kategori::all();
        return view('produk.produk', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('produk.formproduk');
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
            $input['foto'] = '/upload/fotoproduk/'.str_slug($input['nama_produk'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/fotoproduk/'), $input['foto']);
        }

        produk::create($input);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Ditambahkan'
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
        $produk = produk::findOrFail($id);
        $kategori = kategori::all();
        return $produk;
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
        $produk = produk::findOrFail($id);

        $input['foto'] = $produk->foto;

        if ($request->hasFile('foto')){
            if (!$produk->foto == NULL){
                unlink(public_path($produk->foto));
            }
            $input['foto'] = '/upload/fotoproduk/'.str_slug($input['nama_produk'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/fotoproduk/'), $input['foto']);
        }

        $produk->update($input);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Diubah'
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
        $produk = produk::findOrFail($id);
        $produk::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus'
        ]);
    }

    public function produk()
    {
        $produk = produk::with('kategori')->get();

        return Datatables::of($produk)
            ->addColumn('foto', function($produk){
                if($produk->foto == NULL){
                    return 'No image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($produk->foto) .'">';
            })
            ->addColumn('action', function($produk){
                return '<a onclick="edit('. $produk->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $produk->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['foto', 'action'])->addIndexColumn()->make(true);
    }
}
