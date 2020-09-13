<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('produk')->get();
        $satuan = DB::table('satuans')->get();
        return view('daftar-produk', ['data' => $data, 'satuan' => $satuan]);
    }

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
        DB::table('produk')->insert([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga_grosir' => $request->harga_grosir,
            'harga_non' => $request->harga_non
        ]);
        return redirect()->back()->with('status', 'Data Berhasil Disimpan');
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
        $data = DB::table('produk')->where('id', $id)->get();
        return view('edit-produk', ['data' => $data]);
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
        DB::table('produk')->where('id',$request->id)->update([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga_grosir' => $request->harga_grosir,
            'harga_non' => $request->harga_non
        ]);
        return redirect()->back()->with('status', 'Data Berhasil Disimpan');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk')->where('id',$id)->delete();
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus');
    }
}
