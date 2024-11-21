<?php

namespace App\Http\Controllers;
use App\Models\KriteriaProduk;
use Illuminate\Http\Request;

class KriteriaProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = KriteriaProduk::latest()->paginate(20);
        return view('kriteriaProduk.index', compact('kriterias'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('KriteriaProduk.create');
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
            'kd_kriteria' => 'required',
            'nm_kriteria'=> 'required',
            'keterangan'=> 'required',
        ]);
        KriteriaProduk::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Data Kriteria Berhasil Disimpan');
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
    // public function edit(KriteriaProduk $kriterium)
    // {
    //     return view('kriteriaProduk.edit', compact('kriteria'));
    // }
    public function edit( $kriterium)
    {
        $kriteria = KriteriaProduk::find($kriterium);
        return view('kriteriaProduk.edit', compact('kriteria'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, KriteriaProduk $kriteria)
    // {
    //     $request->validate([
    //         'kd_kriteria' => 'required',
    //         'nm_kriteria' => 'required',
    //         'keterangan' => 'required',
    //     ]);
    //     $kriteria->update($request->all());
    //     // dd($request->all());
    //     // $kriteria->update([
    //     //     'kd_kriteria' => $request->kd_kriteria,
    //     //     'nm_kriteria' => $request->nm_kriteria,
    //     //     'keterangan' => $request->keterangan,
    //     // ]);
    //     return redirect()->route('kriteria.index')->with('success', 'Data Kriteria Berhasil Diubah');
    // }

    public function update(Request $request,  $kriterium)
    {
        $request->validate([
            'kd_kriteria' => 'required',
            'nm_kriteria' => 'required',
            'keterangan' => 'required',
        ]);
        $kriteria = KriteriaProduk::findOrFail($kriterium);
        $kriteria->kd_kriteria = $request->kd_kriteria;
        $kriteria->nm_kriteria = $request->nm_kriteria;
        $kriteria->keterangan = $request->keterangan;

        $kriteria->save();

        return redirect()->route('kriteria.index')->with('success', 'Data Kriteria Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaProduk $kriterium)
    {
        $kriterium->delete();
        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Dihapus');
    }
}
