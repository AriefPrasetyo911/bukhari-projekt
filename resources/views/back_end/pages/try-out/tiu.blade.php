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
                                Paket Soal TIU
                            </div>
                            <div class="col-6">
                                <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#TambahSoalTIU">Tambah Paket TIU</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dashboard">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">KKM</th>
                                    <th scope="col">Waktu</th>
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
<div class="modal fade" id="TambahSoalTIU"  data-backdrop="static" tabindex="-1" aria-labelledby="TambahSoalTIULabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TambahSoalTIULabel">Tambah Paket Soal TIU</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('try-out.tambah-soal.tiu')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="misal: Paket TIU 1" aria-describedby="namaPaket" required>
                </div>
                <div class="form-group">
                    <label for="deskripsiPaket">Deskripsi Paket</label>
                    <textarea class="form-control" id="deskripsiPaket" name="deskripsiPaket" rows="3" placeholder="Masukkan deskripsi paket disini" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis_paket">Jenis Paket</label>
                            <input type="text" class="form-control" name="jenis_paket" id="jenis_paket" disabled aria-describedby="namaPaket" value="TIU">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kkm">KKM</label>
                            <input type="number" class="form-control" name="kkm" id="kkm" placeholder="masukkan KKM. Misal 80" aria-describedby="KKM" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="waktu">Waktu (Menit)</label>
                            <input type="text" class="form-control" name="waktu" id="waktu" required aria-describedby="namaPaket" placeholder="Masukkan batas waktu pengerjaan soal">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tampil">Tampil?</label>
                            <select class="form-control" id="tampil" name="tampil" required>
                            <option selected=''>Silakan Pilih</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
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
<div class="modal fade" id="EditSoalTWK" data-backdrop="static" tabindex="-1" aria-labelledby="EditSoalTWKLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditSoalTWKLabel">Edit Soal TIU</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('try-out.update-soal-tiu')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="tiu_id" id="tiu_id">
            <div class="modal-body">
                <div class="form-group">
                        <label for="nama_paket_edit">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket_edit" id="nama_paket_edit" placeholder="misal: Paket TWK 1" aria-describedby="namaPaket" required>
                </div>
                <div class="form-group">
                    <label for="deskripsiPaket_edit">Deskripsi Paket</label>
                    <textarea class="form-control" id="deskripsiPaket_edit" name="deskripsiPaket_edit" rows="3" placeholder="Masukkan deskripsi paket disini" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis_paket_edit">Jenis Paket</label>
                            <input type="text" class="form-control" name="jenis_paket_edit" id="jenis_paket_edit" disabled aria-describedby="jenispaket" value="TIU">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kkm_edit">KKM</label>
                            <input type="number" class="form-control" name="kkm_edit" id="kkm_edit" placeholder="masukkan KKM. Misal 80" aria-describedby="KKM" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="waktu_edit">Waktu (Menit)</label>
                            <input type="text" class="form-control" name="waktu_edit" id="waktu_edit" required aria-describedby="namaPaket" placeholder="Masukkan batas waktu pengerjaan soal">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tampil_edit">Tampil?</label>
                            <select class="form-control" id="tampil_edit" name="tampil_edit" required>
                            <option selected=''>Silakan Pilih</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
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
                    url: '{!! route('try-out.get-soal-tiu') !!}',
                    
                },
                columns: [
                    {data: 'nama_paket', name: 'nama_paket', orderable: true, searchable: true },
                    {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true },
                    {data: 'jenis', name: 'jenis', orderable: true, searchable: true },
                    {data: 'kkm', name: 'kkm', orderable: true, searchable: true },
                    {data: 'waktu', name: 'waktu', orderable: true, searchable: true },
                    {data: 'tampil', name: 'tampil', orderable: true, searchable: true },
                    {data: 'action', name: 'action', orderable: false, searchable: false, },
                ],
                "drawCallback": function (setting) {}
            });

            $('.table-dashboard').on("click", '#editTIU', function(){
                $('#EditSoalTWK').modal('show');
                var idVal = $(this).data('id');
                console.log(idVal);
                $.get("/administrator/try-out/tiu/edit/"+idVal, (data) => {
                    $("#tiu_id").val(idVal);
                    $("#nama_paket_edit").val(data.nama_paket);
                    $("#deskripsiPaket_edit").val(data.deskripsi);
                    // $("#jenis_paket_edit").val(strtoupper(data.jenis));
                    $("#kkm_edit").val(data.kkm);
                    $("#waktu_edit").val(data.waktu);
                    $("#tampil_edit").val(data.tampil);
                })
            });

            $('body').on('click', '.delete-TIU-btn', function (e){
                var tiu_id = $(this).data("id");
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
                            url: "/administrator/try-out/tiu/hapus-soal/"+tiu_id,
                            success: function (data) {
                                table_dashboard.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });

                        //check detail_soal
                        $.get('/administrator/soal/pembahasan/cek/detail-soal/'+tiu_id, (data) => {
                            if(data == 1){
                                $.ajax({
                                    type: "DELETE",
                                    url: "/administrator/soal/pembahasan/hapus/detail-soal/"+tiu_id,
                                    success: function (data) {
                                        table_dashboard.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });
                            }
                        })
                        //check pembahasan
                        $.get('/administrator/soal/pembahasan/cek/'+tiu_id, (data) => {
                            if(data == 1){
                                $.ajax({
                                    type: "DELETE",
                                    url: "/administrator/soal/pembahasan/hapus/"+tiu_id,
                                    success: function (data) {
                                        table_dashboard.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });
                            }
                        })

                        Swal.fire(
                            'Dihapus!',
                            'Soal TIU berhasil dihapus.',
                            'success'
                        );
                    }
                })
            });
        })
    </script>
@endpush