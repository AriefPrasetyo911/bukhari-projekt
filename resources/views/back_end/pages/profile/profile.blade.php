@extends('back_end.pages.layouts.app')
@section('css')
    <style>
        #nama_banks{
            font-weight: bold;
            font-size: 18px;
            margin-bottom: .5rem
        }

        #no_rek{
            font-weight: 600;
            font-size: 16px;
            margin-bottom: .25rem;
        }

        #atas_namas{
            margin-top: .25rem;
            font-size: 16px;
            font-weight: 600;
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
                    <li class="breadcrumb-item active">Profile</li>
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
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Profil CV
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm float-right edit-profile" data-toggle="modal" data-id="{{$dataProfile->id}}" data-target="#editProfile">Edit Profil</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="h5 text-center">{{$dataProfile->nama_cv}}</div>
                        <hr class="mb-4 mt-3">
                        <p class="d-flex justify-content-center"><img src="{{asset('img/'.$dataProfile->struktur_organisasi)}}" alt="" class="w-50"></p>
                        <hr class="mb-4 mt-3">
                        <div class="h5 text-center">Alamat</div>
                        <h6 class="text-center">{{$dataProfile->alamat}}</h6>
                        <hr class="mb-4 mt-3">
                    </div>
                </div>

                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Data Bank
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm float-right tambah-bank" data-toggle="modal" data-target="#tambahBank">Tambah Bank</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($databank as $bank)
                            <div class="col-lg-4 col-12">
                                <div class="card card-info card-outline">
                                    <div class="card-body">
                                        <p id="nama_banks">{{$bank->nama_bank}}</p>
                                        <p id="no_rek">{{$bank->no_rekening}}</p>
                                        <hr>
                                        <p id="atas_namas">{{$bank->atas_nama}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal Edit Profile-->
<div class="modal fade" id="editProfile"  data-backdrop="static" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfile">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                        <label for="nama_paket">Nama CV</label>
                        <input type="text" class="form-control" name="nama_cv" id="nama_cv" placeholder="Masukkan nama CV" aria-describedby="nama_cv" required>
                </div>
                <div class="form-group">
                    <label>Struktur Organisasi</label>
                    <div class="custom-file">
                        <input type="file" name="struktur_organisasi" class="custom-file-input form-control" id="struktur_organisasi" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <small id="text" class="form-text text-muted">Gambar / Foto Struktur Organisasi Sekarang: </small>
                        <small id="org_now" class="form-text text-primary font-weight-bold"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat_cv">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat_cv" name="alamat_cv" rows="3" placeholder="Masukkan alamat lengkap CV" required></textarea>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- modal tambah bank --}}
<div class="modal fade" id="tambahBank"  data-backdrop="static" tabindex="-1" aria-labelledby="tambahBankLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahBank">Tambah Bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('tambahBank')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_paket">Nama Bank</label>
                    <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Masukkan Nama Bank" aria-describedby="nama_bank" required>
                </div>
                <div class="form-group">
                    <label for="nama_paket">Nomor Rekening</label>
                    <input type="number" class="form-control" name="rek_bank" id="rek_bank" placeholder="Masukkan Nama Bank" aria-describedby="rek_bank" required>
                </div>
                <div class="form-group">
                    <label for="nama_paket">Atas Nama</label>
                    <input type="text" class="form-control" name="atas_nama" id="atas_nama" placeholder="Masukkan Nama Bank" aria-describedby="atas_nama" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('body').on("click", '.edit-profile', function(){
                var idVal = $(this).data('id');
                console.log(idVal);
                $.get("/administrator/profile/edit/"+idVal, (data) => {
                    $("#id").val(idVal);
                    $("#nama_cv").val(data.nama_cv);
                    $("#org_now").html(data.struktur_organisasi);
                    $("#alamat_cv").val(data.alamat);
                })
            });

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        })
    </script>
@endpush