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
                            <h5 class="h3 mb-0">Detail Transaksi</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-2">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Qty</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td><?= $no ?></td>
                     <td>{{ $item->nama_produk }}</td>
                     <td>{{ $item->satuan }}</td>
                     <td>{{ $item->qty }}</td>
                     <td>Rp.{{ $item->jumlah }}</td>
                   </tr>
                   <?php $no++; ?>
                   @endforeach
                 </tbody>
               </table>
             </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12">
           <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Detail Pembayaran</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                     <table class="table align-items-center table-flush table-striped" id="table-transaksi">
                       <thead class="thead-light">
                         <tr>
                           <th>Nama Customer</th>
                           <th>Nomor Telepon</th>
                           <th>Tipe Belanja</th>
                           <th>Total Belanja</th>
                           <th>Tunai Diterima</th>
                           <th>Tunai Kembali</th>
                           <th>Waktu Belanja</th>
                           <th></th>
                         </tr>
                       </thead>
                       <tbody>
                           @foreach ($dataa as $item)
                               <tr>
                                   <td>{{ $item->nama_customer }}</td>
                                   <td>{{ $item->no_telpon }}</td>
                                   <td>{{ $item->grosir == 1 ? 'Grosir' : 'Non Grosir' }}</td>
                                   <td>Rp.{{ $item->total }}</td>
                                   <td>Rp.{{ $item->tunai }}</td>
                                   <td>Rp.{{ $item->kembali }}</td>
                                   <td>Rp.{{ $item->tanggal }}</td>
                               </tr>
                           @endforeach
                       </tbody>
                     </table>
                   </div>
              </div>
           </div>
         </div>
      </div>
@include('layout/footer')
