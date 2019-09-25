<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;
use App\transaksi;
use App\customer;
use App\makanan;
use App\minuman;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        $customer = customer::all();
        $makanan = makanan::all();
        $minuman = minuman::all();
        return view('transaksi.transaksi', compact('transaksi', 'customer', 'makanan', 'minuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = transaksi::all();
        $customer = customer::all();
        $makanan = makanan::all();
        $minuman = minuman::all();
        return view ('transaksi.formtransaksi', compact('transaksi', 'customer', 'makanan', 'minuman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new transaksi;
        $transaksi->id_customer = $request->id_customer;
        $transaksi->id_makanan = $request->id_makanan;
        $transaksi->id_minuman = $request->id_minuman;
        $transaksi->jumlah_makanan = $request->jumlah_makanan;
        $transaksi->jumlah_minuman = $request->jumlah_minuman;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->tgl_pesan = $request->tgl_pesan;
        $transaksi->tgl_kirim = $request->tgl_kirim;
        $transaksi->alamat_tujuan = $request->alamat_tujuan;
        $transaksi->save();
        return redirect('/transaksi');

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
        $transaksi = transaksi::findOrFail($id);
        $customer = customer::all();
        $makanan = makanan::all();
        $minuman = minuman::all();
        return $transaksi;
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
        $transaksi = transaksi::find($request->id);
        $transaksi->id_makanan = $request->id_makanan;
        $transaksi->jumlah_makanan = $request->jumlah_makanan;
        $transaksi->id_minuman = $request->id_minuman;
        $transaksi->jumlah_minuman = $request->jumlah_minuman;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->tgl_pesan = $request->tgl_pesan;
        $transaksi->tgl_kirim = $request->tgl_kirim;
        $transaksi->alamat_tujuan = $request->alamat_tujuan;
        $transaksi->save();
        return redirect('/transaksi');

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
        $transaksi = transaksi::findOrFail($id);
        $transaksi::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Berhasil Dihapus.'
        ]);
    }

    public function transaksi()
    {
        $transaksi = transaksi::with('customer','makanan','minuman')->get();
        return Datatables::of($transaksi)
            ->addColumn('action', function($transaksi){
                return '<a onclick="edit('. $transaksi->id .')" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                 ' <a onclick="hapus('. $transaksi->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })->addIndexColumn()->make(true);
    }

    public function total($id, $jul)
    {
        $cari = makanan::find($id);
        $data = $jul * $cari->harga_makanan;
        return $data;
    }

    public function total1($id, $jum, $total)
    {
        $temu = minuman::find($id);
        $data = ($jum * $temu->harga_minuman) + $total;
        return $data;
    }
}