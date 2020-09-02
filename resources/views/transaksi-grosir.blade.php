 
     @include('layout/header')
     <div class="header bg-primary pb-6">
       <div class="container-fluid pt-6">
       </div>
    </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
        <div class="row">
        @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong>Sukses!</strong> {{ session()->get('status') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if(session()->has('delete'))
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
                  <div class="col-4 text-right">
                    <a href="{{route('transaksi')}}" class="btn btn-md btn-secondary" ">Transaksi Untuk Non Grosir</a>
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
                            <select onchange="test()"  id="nama_produk" class="form-control" name="nama_produk" required data-toggle="select" placeholder="Pilih Produk">
                                <option value="">Pilih Produk</option>
                              @foreach ($produk as $item)
                            <option value="{{$item->nama_produk}}">{{$item->nama_produk}}</option>
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
                          <input disabled class="form-control" placeholder="Total " id="total" type="number">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                              <input type="submit" value="Tambah Data" class="btn btn-block btn-default">
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
                        <table class="table align-items-center table-flush table-striped">
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
                            <tr>
                              <td>
                                <span class="text-muted">76164217</span>
                              </td>
                              <td>
                                <span class="text-muted">Marlboro Merah - Bks</span>
                              </td>
                              <td>
                                <span class="text-muted">Marlboro Merah - Bks</span>
                              </td>
                              <td>
                                <span class="text-muted">Rp. 360000</span>
                              </td>
                              <td class="table-actions">
                                <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                  <i class="fas fa-trash"></i>
                                </a>
                              </td>
                            </tr>
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
                    <form>
                        <!-- Input groups with icon -->
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Nama Pelanggan" id="nama_customer" name="nama_customer" type="text">
                                </div>
                              </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input class="form-control" placeholder="Nomor Telepon" id="no_tel" name="no_tel" type="number">
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
                                    <input class="form-control" placeholder="Uang Diterima" id="nama_customer" name="nama_customer" type="text">
                                  </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                  <input class="form-control" disabled placeholder="  Uang Kembali" id="nama_customer" name="nama_customer" type="text">
                                </div>
                              </div>
                          </div>
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
<script>
function test(){
    var sel = document.getElementById("nama_produk");
    var nama_produk= sel.options[sel.selectedIndex].value;
    // var qty = document.getElementById("qty").value;
    var harga = null;
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('harga-grosir') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: {
                nama_produk:nama_produk
            },
            success: function(result) {
                // console.log(result[0].harga_non);
                // console.log(res.harga_non);
                harga = result[0].harga_grosir;
                $("#qty").keyup(function () {
                    var qty = $(this).val();
                    var total = harga*qty;
                    $('#total').val(total);
                });
                
                // $('#total').val(result[0].harga_non);
            }
        });
    });
}
         </script>
@include('layout/footer')