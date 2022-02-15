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
            <li class="breadcrumb-item"><a href="#">Jadwal Try Out</a></li>
            <li class="breadcrumb-item active">TKP</li>
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
            <div class="col-lg-12 col-12">
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
            // let table_dashboard = $('.table-dashboard').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     lengthChange: true,
            //     ajax: {
            //         url: '{!! route('get-soal-dashboard') !!}',
            //     },
            //     columns: [
            //         {data: 'nama_paket', name: 'nama_paket', orderable: true, searchable: true },
            //         {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
            //         // {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
            //         {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
            //         {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
            //         // {data: 'action', name: 'action', orderable: false, searchable: false, },
            //     ],
            //     "drawCallback": function (setting) {}
            // });
        })
    </script>
@endpush