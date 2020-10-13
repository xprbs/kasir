<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>receipt</title>
</head>
<style>
    body {
        font-family: arial;
        font-size: 10pt;
    }

    table tr td,
    table tr th {
        font-size: 8pt;
        font-weight: normal;
    }

    .tr {
        margin-bottom: 10px;
    }

    .heading {
        font-size: 12px;
    }

    .jalan {
        font-size: 9px;
    }

    .detail {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 8pt;
        line-height: 20px;
    }

    hr.new2 {
        border-top: 2px dashed black;
    }

    .judul {
        width: 58mm;
        font-size: 8pt;
        font-weight: bold;
    }

</style>

<body onload="window.print()">
    <table width=200px>
        <tr>
            <td colspan="3" align="center"><b>Toko Surya</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><b>Jln. Sekeloa Selatan I No.103B</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><b>Bandung</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><b>081809717714</b></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr class="new2">
            </td>
        </tr>
        @foreach ($dataa as $item)
            <tr>
                <td>ID Transaksi</td>
                <td>:</td>
                <td>{{ $item->id_transaksi }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $item->tanggal }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>:</td>
                <td>Kasir</td>
            </tr>
            <tr>
                <td>Customer</td>
                <td>:</td>
                <td>{{ $item->nama_customer }}</td>
            </tr>
            <tr>
                <td>Tipe Penjualan</td>
                <td>:</td>
                <td>{{ $item->grosir == 1 ? 'Grosir' : 'Non Grosir' }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr class="new2">
                </td>
            </tr>
        @endforeach
    </table>
    <table width=200px border=0 class='table' cellspacing=0 cellpadding=10>
        <thead class="tr">
            <tr class="tr">
                <th align="left">Produk</th>
                <th>Qty</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->qty }} x {{ $item->satuan }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <hr class="new2">
                </td>
            </tr>
            @foreach ($dataa as $items)
                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b>Rp.{{ $items->total }}</b></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Tunai</b></td>
                    <td><b>Rp.{{ $items->tunai }}</b></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Kembali</b></td>
                    <td><b>Rp.{{ $items->kembali }}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><b>Terima Kasih</b></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </center>
    </section>
</body>

</html>
