@extends('back_end.pages.layouts.app')
@section('css')
    <style>
        .hide{
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
                                        <button type="button" class="btn btn-outline-primary btn-sm modalShow" data-id="{{$item->id}}" data-id_paket="{{$item->id_paket}}" data-toggle="modal" data-target="#modalDetail">Detail</button>
                                        {{-- <button type="button" class="btn btn-success btn-sm">Beli</button> --}}
                                        {{-- <a href="javascript:void(0)" data-toggle="tooltip" data-harga="{{$item->harga}}" data-original-title="Delete" class="btn btn-sm btn-outline-success beli-paket-btn">Beli Try Out</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-four-dibeli" role="tabpanel" aria-labelledby="custom-tabs-four-dibeli-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Jadwal</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jumlah Soal</th>
                                    <th scope="col">Akan Dimulai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1?>
                                @if ($cekData > 0)
                                    @foreach ($ambiljadwal as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama_jadwal}}</td>
                                        <td>{{$item->tanggal->isoFormat('dddd, D MMMM Y')}}</td>
                                        <td>{{$item->harga}}</td>
                                    @endforeach
                                    @foreach ($pembelian as $item)
                                        <td>{{$item->nama_paket}}</td>
                                        <td>{{strtoupper($item->jenis)}}</td>
                                        <td>{{$item->deskripsi}}</td>
                                        <td>{{$jumlahSoal}}</td>
                                    @endforeach
                                    @if ($pembulatan < 0)
                                        <td>
                                            <span class="badge badge-success" style="font-size: 12px;">{{abs($pembulatan)}} Hari Lagi</span>
                                        </td>
                                    @elseif($pembulatan == 0)
                                        <td>
                                            <span class="badge badge-primary" style="font-size: 12px;">Try Out hari Ini</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger" style="font-size: 12px;">Tanggal Try Out Sudah Lewat</span>
                                        </td>
                                    @endif
                                    @foreach ($ambiljadwal as $item)
                                    <td>
                                        @if ($pembulatan == 0)
                                            <a href="{{route('kerjakan-try-out', [$item->id, $item->jenis, $item->id_paket])}}">
                                                <button class="btn btn-success btn-sm" id="kerjakan-try-out">Kerjakan Try Out</button>
                                            </a>
                                        @else
                                            <a href="{{route('kerjakan-try-out', [$item->id, $item->jenis, $item->id_paket])}}">
                                                <button class="btn btn-success btn-sm" id="kerjakan-try-out" disabled>Kerjakan Try Out</button>
                                            </a>
                                        @endif
                                    </td>
                                    @endforeach
                                @endif
                                </tr>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modalDetail"  data-backdrop="static" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDetail">Detail Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('pembelian-jadwal.twk')}}" method="post" class="submitPurchase">
            @csrf
            <input type="hidden" name="id_paket" id="id_paket">
            <input type="hidden" name="nama_paket_hidden" id="nama_paket_hidden">
            <input type="hidden" name="deskripsi_paket_hidden" id="deskripsi_paket_hidden">
            <input type="hidden" name="jumlah_soal" id="jumlah_soal" value="{{$jumlahSoal}}">
            <input type="hidden" name="harga_paket" id="harga_paket">
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">Nama Paket</div>
                            <div class="col-lg-8">
                                <div id="nama_paket"></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">Jenis</div>
                            <div class="col-lg-8">
                                <div id="jenis_paket"></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">KKM</div>
                            <div class="col-lg-8">
                                <div id="kkm_paket"></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">Waktu Pengerjaan</div>
                            <div class="col-lg-8">
                                <div id="waktu_paket"></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">Deskripsi</div>
                            <div class="col-lg-8">
                                <div id="deskripsi_paket"></div>
                            </div>
                        </div>
                    </li>
                </ul>       
            </div>
            <div class="footer p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <span class="badge badge-primary float-left hide" id="sudahDibeli" style="font-size: 12px;">Jadwal ini sudah dibeli</span>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success" id="beliTryOut">Beli Try Out</button>
                    </div>
                </div>
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
            $(".table").dataTable();
            $(".modalShow").on("click", function() {
                var id = $(this).data('id');
                var id_paket = $(this).data('id_paket');
                $.get('/home/jadwal-try-out/twk/get-data/'+id_paket, (data) => {
                    $("#nama_paket").html(': '+data[0].nama_paket)
                    $("#jenis_paket").html(': '+data[0].jenis)
                    $("#kkm_paket").html(': '+data[0].kkm)
                    $("#waktu_paket").html(': '+data[0].waktu+' Menit')
                    $("#deskripsi_paket").html(': '+data[0].deskripsi)
                    //hidden
                    $("#nama_paket_hidden").val(data[0].nama_paket);
                    $("#deskripsi_paket_hidden").val(data[0].deskripsi);
                });

                $.get('/home/jadwal-try-out/twk/data-jadwal/'+id+'/'+id_paket, (data) => {
                    $("#id_paket").val(data[0].id_paket);
                    $("#harga_paket").val(data[0].harga);
                })

                $.get('/home/jadwal-try-out/twk/cek/'+id_paket, (data) => {
                    if(data.length > 0){
                        $("#beliTryOut").remove();
                        $("#sudahDibeli").removeClass('hide');
                        $(".btn-danger").removeClass('mr-2');
                    }
                })
            })
        });

        $("#beliTryOut").on('click', function(e){
            e.preventDefault();
        })

        $('body').on("click", "#beliTryOut", function(){
            // var jadwal_id = $(this).data("id");
            var idPaket = $(this).data("idPaket");
            var jumlahSoal = $(this).data("jumlahSoal");
            var harga = $(this).data("harga");
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Jadwal Try Out yang sudah dibeli tidak dapat dikembalikan",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(".submitPurchase").submit();

                    Swal.fire(
                        'Dibeli!',
                        'Jadwal Try Out Berhasil Dibeli',
                        'success'
                    );
                }
            })
        })

        // $(document).ready(() => {
        //     $("#detailModal").on("click", function() {
        //         console.log('modal');
        //         var id = $(this).data('id');
        //         $.get('/home/jadwal-try-out/twk/get-data'+id, data() => {
        //             console.log(data);
        //         })
        //     })
        // })
    </script>
@endpush