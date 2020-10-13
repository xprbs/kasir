@include('layout/header')
<div class="header bg-primary pb-6">
    <div class="container-fluid pt-6">
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Sukses!</strong> {{ session()->get('status') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Sukses!</strong> {{ session()->get('delete') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Transaksi Penjualan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <select onchange="test()" id="nama_produk" class="form-control"
                                            name="nama_produk" required data-toggle="select" placeholder="Pilih Produk">
                                            <option value="">Pilih Produk</option>
                                            @foreach ($produk as $item)
                                                <option value="{{ $item->nama_produk }}">{{ $item->kode_produk }} -
                                                    {{ $item->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-number"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Qty" id="qty" name="qty" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <input disabled class="form-control" placeholder="Total " id="total"
                                            type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <button type="button" class="btn btn-block btn-default" id="tambahData">Tambah
                                            Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <!-- Title -->
                            <h5 class="h3 mb-0">DetailTransaksi</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-striped" id="table-transaksi">
                            <thead class="thead-light">
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Checkout Pesanan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('transaksi-grosir.store') }}" method="POST">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Nama Pelanggan" id="nama_customer"
                                            name="nama_customer" type="text">
                                        <input class="form-control" placeholder="Nomor Telepon" id="no_tel"
                                            name="no_tel" type="hidden" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Uang Diterima" id="uang_diterima"
                                            name="uang_diterima" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .gede {
                                background-color: #070d59;
                                height: 100px;
                                text-align: center;
                                color: white;
                                font-size: 30px;
                            }

                            .gede:focus {
                                background-color: #070d59;
                                color: white;
                            }

                        </style>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <input class="form-control gede" placeholder="Uang Kembali" id="uang_kembali"
                                            name="uang_kembali" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kumpulan-transaksi" hidden>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <input class="btn btn-block btn-success" type="submit" value="Checkout Pesanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            var kode_produk;
            var id_produk;
            var name_produk;
            var harga = null;
            var jumlah_biaya = 0;

            function test() {
                var sel = document.getElementById("nama_produk");
                var nama_produk = sel.options[sel.selectedIndex].value;
                // var qty = document.getElementById("qty").value;
                $(document).ready(function() {
                    $.ajax({
                        url: "{{ route('harga') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        data: {
                            nama_produk: nama_produk
                        },
                        success: function(result) {
                            kode_produk = result[0].kode_produk;
                            id_produk = result[0].id;
                            // console.log(result[0].harga_grosir);
                            // console.log(res.harga_grosir);
                            harga = result[0].harga_grosir;
                            name_produk = result[0].nama_produk;
                            if ($('#qty').val() != '') {
                                var qty = $('#qty').val();
                                var total = harga * qty;
                                $('#total').val(total);
                            } else {
                                $('#total').val('0');
                            }
                            $("#qty").keyup(function() {
                                var qty = $(this).val();
                                var total = harga * qty;
                                $('#total').val(total);
                            });

                            // $('#total').val(result[0].harga_grosir);
                        }
                    });
                });
            }

            // ----------------- tambah data ------------------------  
            let i = 0;
            $('#tambahData').click(function() {
                let qty = $('#qty').val();
                let tr =
                    `
                                                                                                                               <tr produk="${i}produk${kode_produk}">
                                                                                                                                           <td>
                                                                                                                                             <span class="text-muted">${kode_produk}</span>
                                                                                                                                           </td>
                                                                                                                                           <td>
                                                                                                                                             <span class="text-muted">${name_produk}</span>
                                                                                                                                           </td>
                                                                                                                                           <td>
                                                                                                                                             <span class="text-muted">${qty}</span>
                                                                                                                                           </td>
                                                                                                                                           <td>
                                                                                                                                             <span class="text-muted jumlah" jumlah=${harga * qty}>RP. ${harga * qty}</span>
                                                                                                                                           </td>
                                                                                                                                           <td class="table-actions">
                                                                                                                                             <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                                                                                                                               <i class="fas fa-trash"></i>
                                                                                                                                             </a>
                                                                                                                                           </td>
                                                                                                                                         </tr>
                                                                                                                               `;
                let new_transaksi =
                    `
                                                                                                                               <div produk="${i}produk${kode_produk}" hidden>
                                                                                                                                 <input type="number" name="item[${i}][id]" value="${id_produk}">
                                                                                                                                 <input type="number" name="item[${i++}][qty]" value="${qty}">
                                                                                                                               </div>
                                                                                                                               `;
                if (qty !== '' && qty > '0' && $('#nama_produk').val() !== '') {
                    $('#table-transaksi tbody').append(tr);
                    $('#kumpulan-transaksi').append(new_transaksi);
                    jumlah_biaya += (harga * qty);
                    let uang = $('#uang_diterima').val();
                    $('#uang_kembali').val(uang_diterima(uang, jumlah_biaya));
                }
            });


            // -------------------------------delete transaksi---------------------
            $(document).on('click', '.table-action-delete', function() {
                let closest_tr = $(this).closest('tr');
                let kode_produk = closest_tr.attr('produk');
                let delete_biaya = closest_tr.find('.jumlah').attr('jumlah');
                let uang = $('#uang_diterima').val();
                jumlah_biaya -= delete_biaya;
                $('#uang_kembali').val(uang_diterima(uang, jumlah_biaya));
                $(`[produk="${kode_produk}"]`).remove();
            });

            // --------------------------- tampilan uang kembali ---------------------
            $('#uang_diterima').keyup(function() {
                let uang = $(this).val();
                $('#uang_kembali').val(uang_diterima(uang, jumlah_biaya));
            });

            function uang_diterima(uang, biaya) {
                return uang - biaya;
            }

        </script>
    @endsection
    @include('layout/footer')
