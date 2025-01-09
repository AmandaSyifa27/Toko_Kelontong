<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\KriteriaProduk;
// use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB as FacadesDB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // $produks = Produk::latest()->paginate(20);
    //     $produks = DB::table('tbl_produk') -> join('tbl_kriteria_produk', 'tbl_kriteria_produk.id','=','tbl_produk.id_kriteria')->get();
    //     return view('produk.index',compact('produks'))->with('i');
    // }

    public function index()
    {
        // $produks = Produk::latest()->paginate(20);
        $produks = Produk::all();
        return view('produk.index',compact('produks'));
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');
        $query = "nm_produk LIKE '%".$cari."%' OR jenis LIKE '%".$cari."%'";
        // $produks = Produk::latest()->paginate(20);
        $produks = DB::table('tbl_produk') -> join('tbl_kriteria_produk', 'tbl_kriteria_produk.id','=','tbl_produk.id_kriteria')->whereRaw($query)->get();
        return view('produk.index',compact('produks'))->with('i');
    }
    // public function cari(Request $request){
    //     $cari = $request->input('cari');
    //     $produk = Produk::where('nama_produk', 'like', "%".$request->cari."%")->orWhere('jenis', 'like', "%".$request->cari."%")->get();
        // $awal = $request->awal;
        // $akhir = $request->akhir;
        // $produk = Produk::whereBetween('created_at', [$awal, $akhir])->get();
    //     return view('Produk.Index', compact('produk'));
    // }

    // public function cari(Request $request)
    // {
    //     $dari = $request->input('dari');
    //     $sampai = $request->input('sampai');
    //     $query = "created_at BETWEEN '%".$dari."%' AND '%".$sampai."%' ";
    //     $produks = DB::table('tbl_produk')
    //                 ->join('tbl_kriteria_produk', 'tbl_kriteria_produk.id','=','tbl_produk.id_kriteria')
    //                 ->whereRaw($query)
    //                 ->get();
    //     return view('produk.index',compact('produks'))->with('i');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriterias = KriteriaProduk::all();
        return view('produk.create', compact('kriterias'));
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
            'nm_produk' => 'required',
            'jenis' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'id_kriteria' => 'required',
            'ket' => 'required',
            'gambar' => 'required',
        ]);

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "Foto_Produk";
        $file->move($tujuan_upload, $nama_file);

        Produk::create([
            "nm_produk" => $request->nm_produk,
            "jenis" => $request->jenis,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "id_kriteria" => $request->id_kriteria,
            "ket" => $request->ket,
            "gambar" => $nama_file,
        ]);

        return redirect()->route('produk.index')->with('succes', 'Data Produk Berhasil Disimpan');
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
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Produk $produk)
    // {
    //     $request->validate([
    //         'nm_produk' => 'required',
    //         'jenis' => 'required',
    //         'stok' => 'required',
    //         'harga' => 'required',
    //         'ket' => 'required',
    //         'gambar' => 'required',
    //     ]);
    //     $produk->update($request->all());
    //     return redirect()->route('produk.index')->with('succes', 'Data Produk Berhasil Diubah');
    // }

    public function update(Request $request, Produk $produk)
{
    $request->validate([
        'nm_produk' => 'required',
        'jenis' => 'required',
        'stok' => 'required',
        'harga' => 'required',
        'ket' => 'required',
    ]);

    if ($request->hasFile('gambar')) {
        if (File::exists('Foto_Produk/' . $produk->gambar)) {
            File::delete('Foto_Produk/' . $produk->gambar);
        }

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = "Foto_Produk";
        $file->move($tujuan_upload, $nama_file);

        $produk->gambar = $nama_file;
    }

    $produk->nm_produk = $request->nm_produk;
    $produk->jenis = $request->jenis;
    $produk->stok = $request->stok;
    $produk->harga = $request->harga;
    $produk->ket = $request->ket;
    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Data Produk Berhasil Diubah');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        File::delete('Foto_Produk/'.$produk->gambar);

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data Produk Berhasil Dihapus');
    }
}
