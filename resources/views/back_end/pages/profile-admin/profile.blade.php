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
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (Auth::user()->picture == null)
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper.png"
                                    alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('foto-profile/'.Auth::user()->picture)}}"
                                    alt="User profile picture">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                            <p class="text-muted text-center">Administrator System</p>
                        </div>
                    </div>
                    <!-- /.card -->
      
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Tentang Saya</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa-solid fa-at"></i> Email</strong>
                            <p class="text-muted">
                                {{Auth::user()->email}}
                            </p>
                            <hr class="mb-2">
                            <strong class="mt-2"><i class="fa-solid fa-image"></i></i> Foto Profil</strong>
                            <p class="text-muted">
                                @if (Auth::user()->picture == null)
                                    Belum ada foto profile
                                @else
                                    {{Auth::user()->picture}}
                                @endif
                            </p>
                            <hr class="mb-2">
                            <strong class="mt-2"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</strong>
                            <p class="text-muted">
                                @if (Auth::user()->gender == null)
                                    Data jenis kelamin belum diatur
                                @else
                                    {{Auth::user()->gender}}
                                @endif
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#foto-profile" data-toggle="tab">Foto Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                        </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="foto-profile">
                                    <form action="{{route('fotoProfileUpdate')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                        <div class="form-group mb-0">
                                            <label for="CarouselImage">Foto Profile</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" placeholder="Browse" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-12 mt-3">
                                                <hr>
                                                <div class="float-right">
                                                    <button class="btn btn-outline-primary mt-3" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="password">
                                    <form action="{{route('passwordUpdate')}}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="position-relative row form-group">
                                            <label for="examplePassword" class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Enter new password here">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group"> 
                                            <label for="examplePassword" class="col-sm-3 col-form-label">Password Confirmation</label>
                                            <div class="col-sm-9">
                                                <input name="passConfirm" id="passConfirm" type="password" class="form-control" placeholder="Enter password confirmation">
                                                <span class="float-right" id="message"></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="position-relative row form-group mt-3">
                                            <label for="examplePassword" class="col-sm-3 col-form-label">Current Password</label>
                                            <div class="col-sm-9">
                                                <input name="currPassword2" id="currPassword2" type="password" class="form-control" placeholder="Enter current password" required>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-check">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button class="btn btn-outline-primary float-right update-btn" type="submit">
                                                    <i class="far fa-edit"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal Edit Profile-->
{{-- <div class="modal fade" id="editProfile"  data-backdrop="static" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
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
{{-- <div class="modal fade" id="tambahBank"  data-backdrop="static" tabindex="-1" aria-labelledby="tambahBankLabel" aria-hidden="true">
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
</div>  --}}
@endsection
@push('scripts')
    <script>
        $(document).ready(() => {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });

        $('#password_baru, #passConfirm').on('keyup', function () {
            var pass = $("#password_baru").val();
            var passConf = $("#passConfirm").val();
            // console.log('new passwor', pass);
            // console.log('confirm new password',passConf);
            if(pass == passConf){
                $('#message').html(`<span class="badge badge-success font75">Password Sama</span>`).css('color', '#2eb85c');
            } else {
                $('#message').html(`<span class="badge badge-danger font75">Password Tidak Sama</span>`).css('color', '#e55353');
            }

            if(pass == '' || passConf == '' || pass && passConf == ''){
                $('#message').html('');
            }
        });
    </script>
@endpush