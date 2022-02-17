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
                    <div class="card-header">
                      Konfirmasi Pembayaran
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-konfirmasi-pembayaran">
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
                                    <th scope="col">Aksi</th>
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
                                        <td>
                                            <a href="{{route('konfirmasi.pembayaran', [$item->id, $item->id_user, $item->email_user])}}" class="btn btn-success btn-sm">Konfirmasi</a>
                                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoModal">Info</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="infoModal" data-backdrop="static" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div> --}}
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
            $('.table-konfirmasi-pembayaran').DataTable();
        })
    </script>
@endpush