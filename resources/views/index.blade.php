 
     @include('layout/header')
     <div class="header bg-primary pb-6">
       <div class="container-fluid">
         <div class="header-body">
           <!-- Card stats -->
           <div class="row pt-4">
             <div class="col-xl-3 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Total Produk</h5>
                       <span class="h2 font-weight-bold mb-0">{{$total_produk}}</span>
                     </div>
                     <div class="col-auto">
                       <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                         <i class="ni ni-active-40"></i>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             
             <div class="col-xl-3 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Sale Hari Ini</h5>
                       <span class="h2 font-weight-bold mb-0">{{$jualhari}}</span>
                     </div>
                     <div class="col-auto">
                       <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                         <i class="ni ni-chart-pie-35"></i>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-xl-3 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Sale Bulan Ini</h5>
                       <span class="h2 font-weight-bold mb-0">{{$jualbulan}}</span>
                     </div>
                     <div class="col-auto">
                       <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                         <i class="ni ni-money-coins"></i>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-xl-3 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                       <span class="h2 font-weight-bold mb-0">{{$jualsemua}}</span>
                     </div>
                     <div class="col-auto">
                       <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                         <i class="ni ni-chart-bar-32"></i>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
       <div class="row">
         <div class="col-xl-12">
           <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Penjualan Hari Ini</h3>
              </div>
             <div class="table-responsive py-2">
                <table class="table table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>
                      <th>Nomor Invoice</th>
                      <th>Nama Customer</th>
                      <th>Tipe Penjualan</th>
                      <th>Tanggal Transaksi</th>
                      <th>Total Belanja</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jualharii as $item)
                    <tr>
                      <td>{{$item->id_transaksi}}</td>
                      <td>{{$item->nama_customer}}</td>
                      <td>{{ $item->grosir == 1 ? 'Grosir'  : 'Non Grosir' }}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>Rp.{{$item->total}}</td>
                      <td>
                        <a href="detail/{{$item->id}}" class="btn btn-info btn-sm">Lihat Detail</a>
                        <a href="cetak/{{$item->id}}" class="btn btn-primary btn-sm">Cetak Struk</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
           </div>
         </div>
       </div>
@include('layout/footer')