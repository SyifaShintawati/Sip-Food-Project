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
        $input = $request->all();
        $input['foto'] = null;

        if ($request->hasFile('foto')){
            $input['foto'] = '/upload/fotominuman/'.str_slug($input['nama_minuman'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/fotominuman/'), $input['foto']);
        }

        minuman::create($input);

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
    public function update(Request $request, $id)
    {
       $input = $request->all();
               $minuman = minuman::findOrFail($id);

               $input['foto'] = $minuman->foto;

               if ($request->hasFile('foto')){
                   if (!$minuman->foto == NULL){
                       unlink(public_path($minuman->foto));
                   }
                   $input['foto'] = '/upload/fotominuman/'.str_slug($input['nama_minuman'], '-').'.'.$request->foto->getClientOriginalExtension();
                   $request->foto->move(public_path('/upload/fotominuman/'), $input['foto']);
               }

               $minuman->update($input);

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
            ->addColumn('fotos', function($minuman){
                if ($minuman->foto == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($minuman->foto) .'">';
            })
            ->addColumn('action', function($minuman){
                return '<a onclick="edit('. $minuman->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $minuman->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['fotos','action'])->addIndexColumn()->make(true);
    }
}
