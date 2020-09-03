<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Transaksi;
use Carbon\Carbon;
use Exception;
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
        $produk = DB::table('produk')->get();
        return view('transaksi', ['produk' => $produk]);
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
    public function check(Request $request)
    {
            $nama_produk = $request->nama_produk;
            $data = DB::select(DB::raw("SELECT * from produk where nama_produk = '$nama_produk'"));
            echo json_encode($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_customer' => 'required',
            'no_tel' => 'required',
        ]);
        
        $grosir = FALSE;
        $items = $request->item; // ambil semua item
        $items = collect($items); // masukan ke method collect
        $items = $items->groupBy('kode_produk'); // di groupkan yang sama
        $item_group = []; // buat array
        $i = 0; // untuk key array item group
        /* memasukan data ke item group */
        foreach($items as $item){
            $item_group[$i]['kode_produk'] = $item->first()['kode_produk'];
            $item_group[$i]['qty'] = $item->sum('qty');
            $item_group[$i]['jumlah'] = $item->sum('qty') * DB::table('produk')->where('kode_produk', $item->first()['kode_produk'])->first()->harga_non;
            $i++;
        }


        $item_group = collect($item_group); 
        $total = $item_group->sum('jumlah');

        try{
            // ------------------- cek apakah uang sesuai dengan semua jumlah -------------------
            if($request->uang_diterima < $total){
                return abort(422,'uang kurang');
            }
            // -------------- create transaksi record  -------------------
            $transaksi = Transaksi::create([
                'id_transaksi' => '',
                'grosir' => $grosir,
                'nama_customer' => $request->nama_customer,
                'no_telpon' => $request->no_tel,
                'total' => $total,
                'tanggal' => Carbon::now(),
                'tunai' => $request->uang_diterima,
                'kembali' => $request->uang_kembali,
            ]);
            $transaksi->update([
                'id_transaksi' => $transaksi->id
            ]);
            // ---------------- create  detail_transaksi record ---------------
            foreach($item_group as $item){
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'nama_produk' => DB::table('produk')->where('kode_produk', $item['kode_produk'])->first()->nama_produk,
                    'qty' => $item['qty'],
                    'satuan' => DB::table('produk')->where('kode_produk', $item['kode_produk'])->first()->harga_non,
                    'grosir' => $grosir,
                    'jumlah' => $item['jumlah']
                ]);
            }
            return back();
        }catch(Exception $e){
            return abort(422,$e->getMessage());
        }
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
