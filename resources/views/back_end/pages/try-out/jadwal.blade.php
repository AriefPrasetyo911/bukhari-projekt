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
                    <li class="breadcrumb-item"><a href="#">Try Out</a></li>
                    <li class="breadcrumb-item active">TIU</li>
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
                                <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#TambahJadwal">Tambah Jadwal</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dashboard">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Nama Jadwal</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Akses</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tampil</th>
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
<div class="modal fade" id="TambahJadwal"  data-backdrop="static" tabindex="-1" aria-labelledby="TambahJadwalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TambahSoalTIULabel">Tambah Jadwal Try Out</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('try-out.tambah-jadwal')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                        <label for="nama_paket">Nama Jadwal</label>
                        <input type="text" class="form-control" name="nama_jadwal" id="nama_jadwal" placeholder="misal: Jadwal Paket TWK" aria-describedby="nama_jadwal" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Jenis Paket</label>
                            <select class="custom-select" name="jenis" id="jenis" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="TWK">TWK</option>
                                <option value="TIU">TIU</option>
                                <option value="TKP">TKP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paket">Pilih Paket</label>
                            <select class="custom-select" name="paket" id="paket" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jenis">Tanggal</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="datepicker" id="datepicker" required>
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jenis">Akses Paket</label>
                            <select class="custom-select" name="akses_paket" id="akses_paket" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="berbayar">Berbayar</option>
                                <option value="gratis">Gratis</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jenis">Tampil?</label>
                            <select class="custom-select" name="tampil" id="tampil" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="ya">ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>   
                <div class="form-group harga hide_element">
                    <label for="jenis">Harga paket</label>
                    <input type="number" class="form-control" name="harga_paket" id="harga_paket" placeholder="Masukkan harga paket">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="editJadwalTryOut" data-backdrop="static" tabindex="-1" aria-labelledby="editJadwalTryOutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editJadwalTryOutLabel">Edit Jadwal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('try-out.update-jadwal')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="jadwal_id" id="jadwal_id">
            <div class="modal-body">
                <div class="form-group">
                        <label for="nama_paket">Nama Jadwal</label>
                        <input type="text" class="form-control" name="nama_jadwal_edit" id="nama_jadwal_edit" placeholder="misal: Jadwal Paket TWK" aria-describedby="nama_jadwal" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Jenis Paket</label>
                            <select class="custom-select" name="jenis_edit" id="jenis_edit" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="TWK">TWK</option>
                                <option value="TIU">TIU</option>
                                <option value="TKP">TKP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Tanggal</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="datepicker_edit" id="datepicker_edit" required>
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Akses Paket</label>
                            <select class="custom-select" name="akses_paket_edit" id="akses_paket_edit" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="berbayar">Berbayar</option>
                                <option value="gratis">Gratis</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Tampil?</label>
                            <select class="custom-select" name="tampil_edit" id="tampil_edit" required>
                                <option selected value="">- Silakan Pilih Satu - </option>
                                <option value="ya">ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>   
                <div class="form-group harga hide_element">
                    <label for="jenis">Harga paket</label>
                    <input type="number" class="form-control" name="harga_paket_edit" id="harga_paket_edit" placeholder="Masukkan harga paket">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Update</button>
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
                    url: '{!! route('try-out.data-jadwal') !!}',
                    
                },
                columns: [
                    {data: 'nama_jadwal', name: 'nama_jadwal', orderable: true, searchable: true },
                    {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
                    {data: 'akses', name: 'akses', orderable: true, searchable: true },
                    {data: 'tanggal', name: 'tanggal', orderable: true, searchable: true },
                    {data: 'harga', name: 'harga', orderable: true, searchable: true },
                    {data: 'tampil', name: 'tampil', orderable: true, searchable: true },
                    {data: 'action', name: 'action', orderable: false, searchable: false, },
                ],
                "drawCallback": function (setting) {}
            });

            $("#datepicker,#datepicker_edit").datepicker({ 
                format: "dd-mm-yyyy",
                todayBtn: "linked"
            });

            $('.table-dashboard').on("click", '#editJadwal', function(){
                $('#editJadwalTryOut').modal('show');
                var idVal = $(this).data('id');
                $.get("/administrator/try-out/jadwal/edit/"+idVal, (data) => {
                    $("#jadwal_id").val(idVal);
                    $("#nama_jadwal_edit").val(data.nama_jadwal);
                    $("#jenis_edit").val(data.jenis);
                    $("#datepicker_edit").val(data.tanggal);
                    $("#akses_paket_edit").val(data.akses);
                    $("#tampil_edit").val(data.tampil);
                    if(data.harga != 0 || data.harga > 0){
                        $('.harga').removeClass('hide_element')
                        $('.harga_paket_edit').prop('required', true);
                        $("#harga_paket_edit").val(data.harga);
                    } else {
                        $('.harga').addClass('hide_element')
                    }
                })
            });

            $('body').on('click', '.delete-jadwal-btn', function (e){
                var jadwal_id = $(this).data("id");
                // var result = confirm("Are You sure want to delete !");
                // e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: "/administrator/try-out/jadwal/hapus/"+jadwal_id,
                            success: function (data) {
                                table_dashboard.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });

                        Swal.fire(
                            'Dihapus!',
                            'Soal TIU berhasil dihapus.',
                            'success'
                        );
                    }
                })
            });

            $("#akses_paket").on('change', () => {
                var akses = $('#akses_paket').val();
                if(akses == 'berbayar'){
                    $('.harga').removeClass('hide_element')
                    $('.harga_paket').prop('required', true);
                } else {
                    $('.harga').addClass('hide_element')
                }
            })

            $("#jenis").on('change', () => {
                var jenis = $("#jenis").val();
                // console.log('jenis change', jenis);
                $.get('/administrator/try-out/jadwal/get-data/'+jenis, (data) => {
                    data.forEach(element => {
                        $("#paket").append(`<option value="${element.id}">
                            ${element.nama_paket}
                        </option>`);
                    });
                })
                $('#paket').empty();
            })

            $("#akses_paket_edit").on('change', () => {
                var akses = $('#akses_paket_edit').val();
                if(akses == 'berbayar'){
                    $('.harga').removeClass('hide_element')
                    $('.harga_paket_edit').prop('required', true);
                } else {
                    $('.harga').addClass('hide_element')
                }
            })
        })
    </script>
@endpush