<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Transaksi;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiGrosirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')->get();
        return view('transaksi-grosir', ['produk' => $produk]);
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
        ]);

        $grosir = TRUE;
        // ----------------- yang ada di list produk -------------------
        if(!empty($request->item['produk'])){
            $items = $request->item['produk']; // ambil semua item produk
            $item_group = $this->produk($items);
            $total = $item_group[1];
        }

        // ------------------- new produk -------------
        if(!empty($request->item['new_produk'])){
            $item_news = $request->item['new_produk']; // ambil semua item produk
            $item_new_groups = $this->new_produk($item_news);
            $total = $item_new_groups[1] + (isset($total) ? $total : 0);
        }

        if(empty($request->item['new_produk']) && empty($request->item['produk'])){
            return abort(422,'silahkan belanja terlebih dahulu');
        }

        try{
            // ------------------- cek apakah uang sesuai dengan semua jumlah -------------------
            if($request->uang_diterima < $total){
                return abort(422,'uang kurang');
            }

            // -------------- create transaksi record  -------------------
            $transaksi = Transaksi::create([
                'id_transaksi' => '',
                'nama_customer' => $request->nama_customer,
                'no_telpon' => $request->no_tel,
                'total' => $total,
                'grosir' => $grosir,
                'tunai' => $request->uang_diterima,
                'kembali' => $request->uang_kembali,
                'tanggal' => Carbon::now()
            ]);
            $transaksi->update([
                'id_transaksi' => $transaksi->id
            ]);

            // ---------------- create  detail_transaksi record ---------------
            if(!empty($request->item['produk'])){
                foreach($item_group[0] as $item){
                    DetailTransaksi::create([
                        'id_transaksi' => $transaksi->id,
                        'nama_produk' => DB::table('produk')->where('id', $item['id'])->first()->nama_produk,
                        'qty' => $item['qty'],
                        'satuan' => DB::table('produk')->where('id', $item['id'])->first()->harga_grosir,
                        'grosir' => $grosir,
                        'jumlah' => $item['jumlah']
                    ]);
                }
            }

            if(!empty($request->item['new_produk'])){
                foreach($item_new_groups[0] as $item_new_group){
                    DetailTransaksi::create([
                        'id_transaksi' => $transaksi->id,
                        'nama_produk' => $item_new_group['nama_produk'],
                        'qty' => $item_new_group['qty'],
                        'satuan' => $item_new_group['satuan'],
                        'grosir' => $grosir,
                        'jumlah' => $item_new_group['jumlah']
                    ]);
                }
            }
            return redirect()->away(route('cetak/{id}',$transaksi->id));
        }catch(Exception $e){ // jika terjadi kesalahan di method try maka akan di lempar ke exception
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

    public function produk($items)
    {
        $items = collect($items); // masukan ke method collect
        $items = $items->groupBy('id'); // di groupkan yang sama
        $item_group = []; // buat array
        $i = 0; // untuk key array item group
        /* memasukan data ke item group */
        foreach($items as $item){
            $item_group[$i]['id'] = $item->first()['id'];
            $item_group[$i]['qty'] = $item->sum('qty');
            $item_group[$i]['jumlah'] = $item->sum('qty') * DB::table('produk')->where('id', $item->first()['id'])->first()->harga_grosir;
            $i++;
        }


        $item_group = collect($item_group); 
        $total = $item_group->sum('jumlah');
        return [$item_group,$total];
    }

    public function new_produk($item_news)
    {
        $item_news = collect($item_news); // masukan ke method collect
        $item_news = $item_news->groupBy('nama_produk'); // di groupkan yang sama
        $item_new_groups = []; // buat array
        $x = 0; // untuk key array item group


        foreach($item_news as $item_new){
            $item_new_groups[$x]['nama_produk'] = $item_new->first()['nama_produk'];
            $item_new_groups[$x]['qty'] = $item_new->sum('qty');
            $item_new_groups[$x]['satuan'] = $item_new->sum('satuan');
            $item_new_groups[$x]['jumlah'] = $item_new->sum('qty') * $item_new->sum('satuan');
            $x++;
        }

        $item_new_groups = collect($item_new_groups);
        $total = $item_new_groups->sum('jumlah');
        return [$item_new_groups,$total];
    }
}
