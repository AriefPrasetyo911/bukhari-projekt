@extends('back_end.pages.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6"></div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Jadwal Try Out</a></li>
            <li class="breadcrumb-item active">TWK</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-jadwal-tab" data-toggle="pill" href="#custom-tabs-four-jadwal" role="tab" aria-controls="custom-tabs-four-jadwal" aria-selected="true">Jadwal Try Out TWK</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-dibeli-tab" data-toggle="pill" href="#custom-tabs-four-dibeli" role="tab" aria-controls="custom-tabs-four-dibeli" aria-selected="false">Try Out Yang Dibeli</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-four-jadwal" role="tabpanel" aria-labelledby="custom-tabs-four-jadwal-tab">
                         <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Jadwal</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Akses</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Soal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1?>
                                @foreach ($twk as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_jadwal}}</td>
                                    <td>{{$item->tanggal->isoFormat('dddd, D MMMM Y')}}</td>
                                    <td>
                                        @if ($item->akses == 'berbayar')
                                            <span class="badge badge-primary">{{ucwords($item->akses)}}</span>
                                        @else
                                            <span class="badge badge-success">{{ucwords($item->akses)}}</span>
                                        @endif
                                    </td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$jumlahSoal}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">Detail</button>
                                        <button type="button" class="btn btn-success btn-sm">Beli</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-four-dibeli" role="tabpanel" aria-labelledby="custom-tabs-four-dibeli-tab">
                         Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
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
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(() => {
            // let table_dashboard = $('.table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     lengthChange: true,
            //     ajax: {
            //         url: '{!! route('jadwalTWK.getData') !!}',
            //     },
            //     columns: [
            //         {data: 'nama_paket', name: 'nama_paket', orderable: true, searchable: true },
            //         {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
            //         // {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
            //         {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
            //         {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
            //         {data: 'jenis_soal', name: 'jenis_soal', orderable: true, searchable: true, },
            //     ],
            //     "drawCallback": function (setting) {}
            // });
        })
    </script>
@endpush