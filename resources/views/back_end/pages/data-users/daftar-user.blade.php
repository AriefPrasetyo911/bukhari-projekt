@extends('back_end.pages.layouts.app')

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
                    <li class="breadcrumb-item"><a href="#">Try Out</a></li>
                    <li class="breadcrumb-item active">TWK</li>
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
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Data User
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dashboard">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Terverifikasi</th>
                                    <th scope="col">Dibuat</th>
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
            var table_dashboard = $('.table-dashboard').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: true,
                ajax: {
                    url: '{!! route('userData.get') !!}',
                    
                },
                columns: [
                    {data: 'name', name: 'name', orderable: true, searchable: true },
                    {data: 'email', name: 'email', orderable: true, searchable: true },
                    {data: 'verified', name: 'verified', orderable: true, searchable: true },
                    {data: 'created_at', name: 'created_at', orderable: true, searchable: true }
                ],
                "drawCallback": function (setting) {}
            });
        })
    </script>
@endpush