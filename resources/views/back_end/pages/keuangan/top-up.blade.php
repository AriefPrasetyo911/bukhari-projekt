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
                    <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                    <li class="breadcrumb-item active">Top Up</li>
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
                                Jadwal Try Out
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dashboard">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">User ID</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Transfer Ke</th>
                                    <th scope="col">Rek. Atas Nama</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Bukti Transfer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
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

<!-- Modal -->
<div class="modal fade" id="buktiTopUp"  data-backdrop="static" tabindex="-1" aria-labelledby="TambahJadwalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TambahSoalTIULabel">Bukti Transfer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('keuanganKonfirmasi')}}" method="POST">
            @csrf
            <input type="hidden" name="id_tf" id="id_tf">
            <input type="hidden" name="nominalTransferHidden" id="nominalTransferHidden">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_paket">User Email</label>
                    <input type="text" class="form-control" name="userEmail" id="userEmail" aria-describedby="userEmail" disabled>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_paket">Transfer Ke Bank</label>
                            <input type="text" class="form-control" name="transferKe" id="transferKe" aria-describedby="transferKe" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_paket">Atas Nama</label>
                            <input type="text" class="form-control" name="atasNamaTransfer" id="atasNamaTransfer" aria-describedby="atasNamaTransfer" disabled>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="nama_paket">Nominal</label>
                    <input type="text" class="form-control" name="nominalTransfer" id="nominalTransfer" aria-describedby="nominalTransfer" disabled>
                </div> 
                <div class="form-group">
                    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" class="card-img-top" alt="...">  
                </div>         
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Konfirmasi</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            </div>
        </form>
      </div>
    </div>
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
            var table_dashboard = $('.table-dashboard').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: true,
                ajax: {
                    url: '{!! route('keuangan.topUp') !!}',
                    
                },
                columns: [
                    {data: 'user_id', name: 'user_id', orderable: true, searchable: true },
                    {data: 'user_email', name: 'user_email', orderable: true, searchable: true },
                    {data: 'transfer_ke', name: 'transfer_ke', orderable: true, searchable: true },
                    {data: 'rek_atas_nama', name: 'rek_atas_nama', orderable: true, searchable: true },
                    {data: 'nominal', name: 'nominal', orderable: true, searchable: true },
                    {data: 'bukti_transfer', name: 'bukti_transfer', orderable: true, searchable: true },
                    {data: 'status', name: 'status', orderable: true, searchable: true },
                    {data: 'action', name: 'action', orderable: false, searchable: false, },
                ],
                "drawCallback": function (setting) {}
            });

            $(".table-dashboard").on('click', '#detailTopUpBtn', function(){
                var data_id = $(this).data('id');
                $.get('/administrator/keuangan/top-up/data/json/'+data_id, (data) => {
                    $("#id_tf").val(data_id);
                    $("#userEmail").val(data.user_email);
                    $("#transferKe").val(data.transfer_ke);
                    $("#atasNamaTransfer").val(data.rek_atas_nama);
                    $("#nominalTransfer").val(data.nominal);
                    $("#nominalTransferHidden").val(data.nominal);
                    $(".card-img-top").attr("src","images/my_other_image.png");
                })
            })
        })
    </script>
@endpush