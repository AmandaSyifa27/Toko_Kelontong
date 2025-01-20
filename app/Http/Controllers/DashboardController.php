<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $produks = Produk::select(DB::raw('stok'), DB::raw("nm_produk"))->pluck('stok', 'nm_produk');

    //     $lbl = $produks->keys();
    //     $dt = $produks->values();
    //     return view('welcome', compact('lbl', 'dt'));
    // }
    public function index()
    {
    
        $produks = Produk::select(DB::raw("stok"), DB::raw("nm_produk"))->pluck('stok','nm_produk');

        $lbl = $produks->keys();
        $dt = $produks->values();
        // return dd($produks);

        $transaksi = Transaksi::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('YEAR(created_at) as tahun'),
            DB::raw('SUM(total) as total_transaksi')
        )
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        ->orderBy('tahun', 'asc')
        ->orderBy('bulan', 'asc')
        ->get();

        // $w = $kriterias->keys();
        // $dt = $kriterias->values();
        // return dd($transaksi);
        // return view('welcome', compact('lbl', 'dt'));
        return view('welcome', compact('lbl', 'dt', 'transaksi'));
    
    }

    public function lineChart()
    {
        
    }

    // {
    //     $produks = Produk::select(DB::raw("stok"), DB::raw("nm_produk"))->pluck('stok','nm_produk');

    //     $lbl = $produks->keys();
    //     $dt = $produks->values();
    //     return view('welcome', compact('lbl', 'dt'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
