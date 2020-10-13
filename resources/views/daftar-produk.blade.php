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
                            <h5 class="h3 mb-0">Daftar Produk Tersimpan</h5>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-md btn-default" data-toggle="modal"
                                data-target="#modal-form">Tambah Data Produk</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                        aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-secondary border-0 mb-0">
                                        <div class="card bg-secondary border-0 mb-0">
                                            <div class="card-body px-lg-5 py-lg-5">
                                                <form role="form" action="{{ route('simpan-produk') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Kode
                                                            Produk</label>
                                                        <input class="form-control " name="kode_produk" type="text"
                                                            required id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Nama
                                                            Produk</label>
                                                        <input class="form-control " name="nama_produk" type="text"
                                                            required id="example-text-input">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label">Satuan Produk</label>
                                                        <select class="form-control" name="satuan" required
                                                            data-toggle="select">
                                                            <option>Pilih Satuan</option>
                                                            @foreach ($satuan as $item)
                                                                <option value="{{ $item->satuan }}">{{ $item->satuan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Harga
                                                            Grosir</label>
                                                        <input class="form-control " name="harga_grosir" type="number"
                                                            required id="example-text-input">
                                                        <input class="form-control " name="harga_non" type="hidden"
                                                            value="0" id="example-text-input">
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary my-4">Simpan
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-2">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Grosir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td><?= $no ?></td>
                     <td>{{ $item->kode_produk }}</td>
                     <td>{{ $item->nama_produk }}</td>
                     <td>{{ $item->harga_grosir }}</td>
                     <td>
                         <a href="edit-produk/{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                         <a href="hapus-produk/{{ $item->id }}" class="btn btn-danger btn-sm">Hapus</a>
                       </td>
                   </tr>
                   <?php $no++; ?>
                   @endforeach
                 </tbody>
               </table>
             </div>
          </div>
        </div>
      </div>
@include('layout/footer')
