<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transaksis = Transaksi::latest()->paginate(20);
        $transaksis = Transaksi::all();
        return view('Transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks = Produk::all();
        return view('Transaksi.create', compact('produks'));
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
            'no_transaksi' => 'required',
            'nm_customer' => 'required',
            'id_produk' => 'required',
            'jumlah_beli' => 'required',
            'diskon' => 'required',
            'total' => 'required',
        ]);
        Transaksi::create($request->all());
        return redirect()->route('transaksi.index')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit( $transaksi)
    {
        $transaksi = Transaksi::findOrFail($transaksi);
        $produks = Produk::all();
        return view('Transaksi.edit', compact('transaksi', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'no_transaksi' => 'required',
            'nm_customer' => 'required',
            'id_produk' => 'required',
            'jumlah_beli' => 'required',
            'diskon' => 'required',
            'total' => 'required',
        ]);

        // $transaksi = Transaksi::findOrFail($transaksi);
        $transaksi->update([
        'no_transaksi' => $request->no_transaksi,
        'nm_customer' => $request->nm_customer,
        'id_produk' => $request->id_produk,
        'jumlah_beli' => $request->jumlah_beli,
        'diskon' => $request->diskon,
        'total' => $request->total,]);
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
