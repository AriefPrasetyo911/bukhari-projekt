@extends('back_end.pages.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$user}}</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users fa-sm"></i>
                        </div>
                        <div class="small-box-footer">
                            Jumlah User
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$admin}}</h3>

                            <p>Pengajar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="small-box-footer">
                            Jumlah Pengajar
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$paketSoal}}</h3>

                            <p>Paket Soal</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-list-alt"></i>
                        </div>
                        <div class="small-box-footer">
                            Jumlah Paket Soal
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>3</h3>

                            <p>Materi</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="small-box-footer">
                            Jumlah Materi
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="col-lg-12 col-12 pr-0 pl-0">
                <div class="card">
                    <div class="card-header">
                        Paket Soal
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dashboard">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">KKM</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
            let table_dashboard = $('.table-dashboard').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: true,
                ajax: {
                    url: '{!! route('get-soal-dashboard') !!}',
                },
                columns: [
                    {data: 'nama_paket', name: 'nama_paket', orderable: true, searchable: true },
                    {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
                    {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
                    {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
                    {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
                    // {data: 'action', name: 'action', orderable: false, searchable: false, },
                ],
                "drawCallback": function (setting) {}
            });
        })
    </script>
@endpush