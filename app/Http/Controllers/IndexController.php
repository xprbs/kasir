<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $hariini = Carbon::now()->toDateString();
        $bulanini = Carbon::now()->month;

        $total_produk = DB::table('produk')->count();

        $jualhari = DB::table('transaksis')->whereDate('tanggal', $hariini)->count();
        $jualbulan = DB::table('transaksis')->whereMonth('tanggal', $bulanini)->count();
        $jualsemua = DB::table('transaksis')->count();
        $jualharii = DB::table('transaksis')->get();

        // dd($jualhari);
        return view('index', [
            'total_produk' => $total_produk,
            'jualhari' => $jualhari,
            'jualbulan' => $jualbulan,
            'jualsemua' => $jualsemua,
            'jualharii' => $jualharii
            ]);    
    }
    public function detail($id)
    {
        $dataa = DB::table('transaksis')->where('id_transaksi', $id)->get(); 
        $data = DB::table('detail_transaksis')->where('id_transaksi', $id)->get();
        return view('detail', ['data' => $data, 'dataa' => $dataa]);
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
        DB::table('transaksis')->where('id', $id)->delete();
        return redirect()->back();
    }
}
