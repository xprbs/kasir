 
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
      </div>
    @endif
       </div>
       <div class="row">
         <div class="col-xl-6">
           <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Tambah Satuan</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                
                <form action="{{route('simpan-satuan')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlInput1">Nama Satuan</label>
                    <input type="text" name="satuan" class="form-control" id="exampleFormControlInput1">
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-md btn-default" id="exampleFormControlInput1" required autocomplete="off" value="SIMPAN DATA">
                    </div>
                </form>
              </div>
           </div>
         </div>
         <div class="col-xl-6">
            <div class="card">
             <div class="card-header">
                 <h3 class="mb-0">Data Satuan</h3>
               </div>
                  
              <div class="table-responsive py-2">
                 <table class="table table-flush" id="datatable-basic">
                   <thead class="thead-light">
                     <tr>
                       <th>Nomor</th>
                       <th>Nama Satuan</th>
                       <th>Aksi</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php $no=1;?>
                     @foreach ($data as $item)
                     <tr>
                      <td><?=$no?></td>
                      <td>{{$item->satuan}}</td>
                      <td><a href="hapus-satuan/{{$item->id}}" class="btn btn-danger btn-sm">Hapus</a></td>
                    </tr>
                    <?php $no++?>
                     @endforeach
                   </tbody>
                 </table>
               </div>
            </div>
          </div>
       </div>
       
@include('layout/footer')