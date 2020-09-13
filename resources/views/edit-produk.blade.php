 
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
                    <h5 class="h3 mb-0">Edit Produk</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('update-produk')}}" method="POST">
                    {{ csrf_field() }}
                    @foreach ($data as $item)
                    <div class="form-group">
                      <label class="form-control-label" for="exampleFormControlInput1">Kode Produk</label>
                      <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="{{$item->id}}">
                      <input type="number" class="form-control" id="exampleFormControlInput1" name="kode_produk" value="{{$item->kode_produk}}">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="exampleFormControlInput1">Nama Produk</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_produk" value="{{$item->nama_produk}}">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="exampleFormControlInput1">Harga Grosir</label>
                      <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_grosir" value="{{$item->harga_grosir}}">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="exampleFormControlInput1">Harga Non Grosir</label>
                      <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_non" value="{{$item->harga_non}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" value="SIMPAN">
                      </div>
                    @endforeach
                </form>
              </div>
           </div>
         </div>
       </div>
@include('layout/footer')