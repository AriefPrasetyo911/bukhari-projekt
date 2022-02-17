@extends('back_end.pages.layouts.app')
@section('css')
    <style>
        .hide_element{
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Try Out</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <x:notify-messages />
        <div class="container-fluid">
            <!-- Main row -->
            <div class="col-lg-12 col-12 pr-0 pl-0">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title">Pembayaran Try Out</h3></li>
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-semua-paket" data-toggle="pill" href="#custom-tabs-paket-all" role="tab" aria-controls="custom-tabs-paket-all" aria-selected="true">Semua Paket</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-two-twk-tab" data-toggle="pill" href="#custom-tabs-two-twk" role="tab" aria-controls="custom-tabs-two-twk" aria-selected="false">Paket TWK</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-two-tiu-tab" data-toggle="pill" href="#custom-tabs-two-tiu" role="tab" aria-controls="custom-tabs-two-tiu" aria-selected="false">Paket TIU</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-two-tkp-tab" data-toggle="pill" href="#custom-tabs-two-tkp" role="tab" aria-controls="custom-tabs-two-tkp" aria-selected="false">paket TKP</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-paket-all" role="tabpanel" aria-labelledby="custom-tabs-semua-paket">
                            <table class="table table-striped table-semua-paket">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Paket</th>
                                        <th scope="col">ID user</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">jumlah_soal</th>
                                        <th scope="col">harga_paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1?>
                                    @foreach ($dataPaket as $item)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_paket}}</td>
                                            <td>{{$item->id_user}}</td>
                                            <td>
                                                @if ($item->jenis == 'twk' || $item->jenis == 'TWK')
                                                    <span class="badge badge-primary">{{strtoupper($item->jenis)}}</td></span>
                                                @elseif($item->jenis == 'tiu' || $item->jenis == 'TIU')
                                                    <span class="badge badge-secondary">{{strtoupper($item->jenis)}}</td></span>
                                                @else
                                                    <span class="badge badge-success">{{strtoupper($item->jenis)}}</td></span>
                                                @endif
                                            <td>{{$item->nama_paket}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->jumlah_soal}} Soal</td>
                                            <td>Rp. {{$item->harga_paket}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-twk" role="tabpanel" aria-labelledby="custom-tabs-two-twk-tab">
                            <table class="table table-striped table-twk w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Paket</th>
                                        <th scope="col">ID user</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">jumlah_soal</th>
                                        <th scope="col">harga_paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1?>
                                    @foreach ($dataPaket_twk as $item)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_paket}}</td>
                                            <td>{{$item->id_user}}</td>
                                            <td>
                                                @if ($item->jenis == 'twk' || $item->jenis == 'TWK')
                                                    <span class="badge badge-primary">{{strtoupper($item->jenis)}}</td></span>
                                                @elseif($item->jenis == 'tiu' || $item->jenis == 'TIU')
                                                    <span class="badge badge-secondary">{{strtoupper($item->jenis)}}</td></span>
                                                @else
                                                    <span class="badge badge-success">{{strtoupper($item->jenis)}}</td></span>
                                                @endif
                                            <td>{{$item->nama_paket}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->jumlah_soal}} Soal</td>
                                            <td>Rp. {{$item->harga_paket}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-tiu" role="tabpanel" aria-labelledby="custom-tabs-two-tiu-tab">
                            <table class="table table-striped table-tiu w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Paket</th>
                                        <th scope="col">ID user</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">jumlah_soal</th>
                                        <th scope="col">harga_paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1?>
                                    @foreach ($dataPaket_tiu as $item)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_paket}}</td>
                                            <td>{{$item->id_user}}</td>
                                            <td>
                                                @if ($item->jenis == 'twk' || $item->jenis == 'TWK')
                                                    <span class="badge badge-primary">{{strtoupper($item->jenis)}}</td></span>
                                                @elseif($item->jenis == 'tiu' || $item->jenis == 'TIU')
                                                    <span class="badge badge-secondary">{{strtoupper($item->jenis)}}</td></span>
                                                @else
                                                    <span class="badge badge-success">{{strtoupper($item->jenis)}}</td></span>
                                                @endif
                                            <td>{{$item->nama_paket}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->jumlah_soal}} Soal</td>
                                            <td>Rp. {{$item->harga_paket}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-tkp" role="tabpanel" aria-labelledby="custom-tabs-two-tkp-tab">
                            <table class="table table-striped table-tkp w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Paket</th>
                                        <th scope="col">ID user</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">jumlah_soal</th>
                                        <th scope="col">harga_paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1?>
                                    @foreach ($dataPaket_tkp as $item)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_paket}}</td>
                                            <td>{{$item->id_user}}</td>
                                            <td>
                                                @if ($item->jenis == 'twk' || $item->jenis == 'TWK')
                                                    <span class="badge badge-primary">{{strtoupper($item->jenis)}}</td></span>
                                                @elseif($item->jenis == 'tiu' || $item->jenis == 'TIU')
                                                    <span class="badge badge-secondary">{{strtoupper($item->jenis)}}</td></span>
                                                @else
                                                    <span class="badge badge-success">{{strtoupper($item->jenis)}}</td></span>
                                                @endif
                                            <td>{{$item->nama_paket}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->jumlah_soal}} Soal</td>
                                            <td>Rp. {{$item->harga_paket}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(() => {
            $('.table-semua-paket, .table-twk, .table-tiu, .table-tkp').DataTable();
        })
    </script>
@endpush