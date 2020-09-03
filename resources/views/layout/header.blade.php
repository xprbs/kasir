<!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="Creative Tim">
   <title>Warung Pintar</title>
   <!-- Favicon -->
   <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
   <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{asset('assets/vendor/select2/dist/css/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.1.0')}}" type="text/css">
   <link rel="stylesheet" href="{{asset('assets/vendor/quill/dist/quill.core.css')}}">
 </head>
 <meta name="csrf-token" content="{{ csrf_token() }}">
 
 <body>
   <!-- Sidenav -->
   <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
       <!-- Brand -->
       <div class="sidenav-header d-flex align-items-center">
         <a class="navbar-brand" href="#">
           <span class="navbar-brand text-primary"><b>Warung Pintar</b></span>
         </a>
         <div class="ml-auto">
           <!-- Sidenav toggler -->
           <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
             <div class="sidenav-toggler-inner">
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
             </div>
           </div>
         </div>
       </div>
       <div class="navbar-inner">
         <!-- Collapse -->
         <div class="collapse navbar-collapse" id="sidenav-collapse-main">
           <!-- Nav items -->
           <ul class="navbar-nav">
               <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{route('index')}}">
                  <i class="ni ni-shop text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ Request::is('transaksi') ? 'active' : '' }}" href="{{route('transaksi')}}">
                  <i class="ni ni-ungroup text-green"></i>
                  <span class="nav-link-text">Transaksi</span>
                </a>
              </li>

              {{-- <li class="nav-item ">
                <a class="nav-link {{ Request::is('satuan') ? 'active' : '' }}" href="{{route('satuan')}}">
                  <i class="ni ni-bullet-list-67 text-orange"></i>
                  <span class="nav-link-text">Satuan</span>
                </a>
              </li> --}}

              <li class="nav-item ">
                <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="{{route('produk')}}">
                  <i class="ni ni-ui-04 text-info"></i>
                  <span class="nav-link-text">Produk</span>
                </a>
              </li>

               {{-- <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                 <i class="ni ni-ui-04 text-info"></i>
                 <span class="nav-link-text">Produk</span>
               </a>
               <div class="collapsed" id="navbar-components">
                 <ul class="nav nav-sm flex-column">
                   <li class="nav-item">
                     <a href="{{route('daftar-produk')}}" class="nav-link">Daftar Produk</a>
                   </li>
                   <li class="nav-item">
                     <a href="../../pages/components/cards.html" class="nav-link">Tambah Produk</a>
                   </li>
                 </ul>
               </div>
             </li> --}}
             {{-- <li class="nav-item">
               <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                 <i class="ni ni-single-copy-04 text-pink"></i>
                 <span class="nav-link-text">Laporan</span>
               </a>
               <div class="collapse" id="navbar-forms">
                 <ul class="nav nav-sm flex-column">
                   <li class="nav-item">
                     <a href="../../pages/forms/elements.html" class="nav-link">Laporan Harian</a>
                   </li>
                   <li class="nav-item">
                     <a href="../../pages/forms/components.html" class="nav-link">Laporan Mingguan</a>
                   </li>
                   <li class="nav-item">
                     <a href="../../pages/forms/validation.html" class="nav-link">Laporan Bulanan</a>
                   </li>
                 </ul>
               </div>
             </li> --}}
             {{-- <li class="nav-item">
                <a class="nav-link" href="../../pages/widgets.html">
                  <i class="ni ni-user-run text-blue"></i>
                  <span class="nav-link-text">Keluar</span>
                </a>
              </li> --}}
           </ul>
           <!-- Divider -->
         </div>
       </div>
     </div>
   </nav>
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     <!-- Header -->
     <!-- Header -->