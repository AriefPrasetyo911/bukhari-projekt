@extends('back_end.pages.layouts.app')
@section('css')
    <style>
        #detailPilihanGanda .list-group .list-group-item {
            border-style: none; 
            padding-top: .5rem; 
            padding-bottom: 0;
        }

        .font-normal{
            font-size: initial;
            color: blue;
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
                    <li class="breadcrumb-item"><a href="#">{{strtoupper($soal->jenis)}}</a></li>
                    <li class="breadcrumb-item"><a href="#">Detail</a></li>
                    <li class="breadcrumb-item active">{{$soal->nama_paket}}</li>
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
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="box-title">Informasi</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">Nama Paket</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $soal->nama_paket }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0" style="font-weight: 600; color: #e61111;">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">ID Paket</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $soal->id }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">Deskripsi</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $soal->deskripsi }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">Jenis Soal</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{$soal->jenis}}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">KKM</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $soal->kkm }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">Waktu</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $soal->waktu.' menit' }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">Dibuat Oleh</div>
                                        <div class="col-lg-1 text-center">:</div>
                                        <div class="col-lg-8 col-12">{{ $namaUser->name }}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    Soal
                                </div>
                                <div class="col">
                                    @if ($soal->jenis == 'tkp')
                                        <button class="btn btn-outline-success float-right" id="tulisSoalTKP" data-toggle="modal" data-target="#tambahSoalTKP">Tulis Soal</button>
                                    @elseif($soal->jenis == 'twk')
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#tambahSoalTWK">Tulis Soal</button>
                                    @else
                                        {{-- tiu --}}
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#tambahSoalTWK">Tulis Soal</button>    
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-detail-twk">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Soal</th>
                                        <th scope="col">Kunci</th>
                                        <th scope="col">Jenis Soal</th>
                                        <th scope="col">Score</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                    <?php $no = 1?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{strip_tags($item->soal)}}</td>
                                        <td>{{$item->kunci_jawaban}}</td>

                                        <td>{{$item->jenis_soal}}</td>
                                        <td>{{$item->score_soal}}</td>
                                        <td>{{$item->pembuat_soal_username}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning mb-1 pembahasan-soal" data-id="{{$item->id}}" data-toggle="modal" data-target="#pembahasan-soal">Pembahasan</button>

                                            @if ($soal->jenis == 'tkp')
                                                <button class="btn btn-sm btn-primary mb-1 ubah-soal-tkp" data-id="{{$item->id}}" data-idpaket="{{$item->id_paket}}" data-toggle="modal" data-target="#ubah-soal-tkp">Ubah</button>
                                            @elseif($soal->jenis == 'twk')
                                                <button class="btn btn-sm btn-primary mb-1 ubah-soal" data-id="{{$item->id}}" data-toggle="modal" data-target="#ubah-soal">Ubah</button>
                                            @else
                                                {{-- tiu --}}
                                                <button class="btn btn-sm btn-primary mb-1 ubah-soal" data-id="{{$item->id}}" data-toggle="modal" data-target="#ubah-soal">Ubah</button>    
                                            @endif
                                            
                                            <button class="btn btn-sm btn-success detail-soal mb-1" data-id="{{$item->id}}" data-toggle="modal" data-target="#detailPilihanGanda">Detail</button>
                                            <form method="POST" action="{{ route('hapusSoal', $item->id) }}" id="delete_form">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger show_confirm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahSoalTWK" data-backdrop="static" tabindex="-1" aria-labelledby="tambahSoalTWKLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSoalTWKLabel">Tulis Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('tambahSoal')}}" method="POST">
            @csrf
            <div class="modal-body" style="overflow-y: scroll">
                <input type="hidden" name="id_paket" value="{{$soal->id }}">
                <input type="hidden" name="jenis_soal" value="{{ Request::segment(4)}}">
                <div style="
                    font-size: 14px;
                    line-height: 23px;
                    margin-bottom: 0px;
                    padding: 0px 15px 0px;
                    height: 50em;
                    overflow-y: scroll;
                    text-align: justify;">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea id="summernote_soal" name="soal" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan A</label>
                        <textarea id="summernote_pilihan_a" name="pilihan_a"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan B</label>
                        <textarea id="summernote_pilihan_b" name="pilihan_b"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan C</label>
                        <textarea id="summernote_pilihan_c" name="pilihan_c"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan D</label>
                        <textarea id="summernote_pilihan_d" name="pilihan_d"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan E</label>
                        <textarea id="summernote_pilihan_e" name="pilihan_e"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kunci">Kunci Jawaban</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="A">
                            <label class="form-check-label" for="inlineRadio1">Jawaban A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="B">
                            <label class="form-check-label" for="inlineRadio2">Jawaban B</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="C">
                            <label class="form-check-label" for="inlineRadio3">Jawaban C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="D">
                            <label class="form-check-label" for="inlineRadio3">Jawaban D</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="E">
                            <label class="form-check-label" for="inlineRadio3">Jawaban E</label>
                        </div>
                    </div>
                    <div class="form-group col-4 pl-0">
                        <label for="score">Skor</label>
                        <input type="number" class="form-control" id="skor" name="skor" placeholder="Skor / Nilai soal">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="tambahSoalTKP" data-backdrop="static" tabindex="-1" aria-labelledby="tambahSoalTKPLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSoalTKPLabel">Tulis Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('tambahSoalTKP')}}" method="POST">
            @csrf
            <div class="modal-body" style="overflow-y: scroll">
                <input type="hidden" name="id_paket" value="{{$soal->id }}">
                <input type="hidden" name="jenis_soal" value="{{ Request::segment(4)}}">
                <div style="
                    font-size: 14px;
                    line-height: 23px;
                    margin-bottom: 0px;
                    padding: 0px 15px 0px;
                    height: 50em;
                    overflow-y: scroll;
                    text-align: justify;">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea id="summernote_soal" name="soal" cols="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan A</label>
                                <textarea id="summernote_pilihan_a" name="pilihan_a"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_1">Nilai Pilihan A</label>
                                <select class="form-control score-select" id="skor_a" name="skor_a" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan B</label>
                                <textarea id="summernote_pilihan_b" name="pilihan_b"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_2">Nilai Pilihan B</label>
                                <select class="form-control score-select" id="skor_b" name="skor_b" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan C</label>
                                <textarea id="summernote_pilihan_c" name="pilihan_c"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_3">Nilai Pilihan C</label>
                                <select class="form-control score-select" id="skor_c" name="skor_c" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan D</label>
                                <textarea id="summernote_pilihan_d" name="pilihan_d"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_4">Nilai Pilihan D</label>
                                <select class="form-control score-select" id="skor_d" name="skor_d" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan E</label>
                                <textarea id="summernote_pilihan_e" name="pilihan_e"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_5">Nilai Pilihan E</label>
                                <select class="form-control score-select" id="skor_e" name="skor_e" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kunci">Kunci Jawaban</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="A">
                            <label class="form-check-label" for="inlineRadio1">Jawaban A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="B">
                            <label class="form-check-label" for="inlineRadio2">Jawaban B</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="C">
                            <label class="form-check-label" for="inlineRadio3">Jawaban C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="D">
                            <label class="form-check-label" for="inlineRadio3">Jawaban D</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="E">
                            <label class="form-check-label" for="inlineRadio3">Jawaban E</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Modal Ubah --}}
<div class="modal fade" id="ubah-soal" data-backdrop="static" tabindex="-1" aria-labelledby="ubah-soalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubah-soalLabel">Ubah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('ubahSoal')}}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <div class="modal-body" style="overflow-y: scroll">
                <input type="hidden" name="edit_id" id="edit_id">
                <input type="hidden" name="jenis_soal" value="{{ Request::segment(4)}}">
                <div style="
                    font-size: 14px;
                    line-height: 23px;
                    margin-bottom: 0px;
                    padding: 0px 15px 0px;
                    height: 50em;
                    overflow-y: scroll;
                    text-align: justify;">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea id="summernote_soal_edit" name="soal_edit" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan A</label>
                        <textarea id="summernote_pilihan_a_edit" name="pilihan_a_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan B</label>
                        <textarea id="summernote_pilihan_b_edit" name="pilihan_b_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan C</label>
                        <textarea id="summernote_pilihan_c_edit" name="pilihan_c_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan D</label>
                        <textarea id="summernote_pilihan_d_edit" name="pilihan_d_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="soal">Pilihan E</label>
                        <textarea id="summernote_pilihan_e_edit" name="pilihan_e_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kunci">Kunci Jawaban</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_edit" id="inlineRadio_edit1" value="A">
                            <label class="form-check-label" for="inlineRadio1">Jawaban A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_edit" id="inlineRadio_edit2" value="B">
                            <label class="form-check-label" for="inlineRadio2">Jawaban B</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_edit" id="inlineRadio_edit3" value="C">
                            <label class="form-check-label" for="inlineRadio3">Jawaban C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_edit" id="inlineRadio_edit4" value="D">
                            <label class="form-check-label" for="inlineRadio3">Jawaban D</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_edit" id="inlineRadio_edit5" value="E">
                            <label class="form-check-label" for="inlineRadio3">Jawaban E</label>
                        </div>
                    </div>
                    <div class="form-group col-4 pl-0">
                        <label for="score">Skor</label>
                        <input type="number" class="form-control" id="skor_edit" name="skor_edit" placeholder="Skor / Nilai soal">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="ubah-soal-tkp" data-backdrop="static" tabindex="-1" aria-labelledby="ubah-soal-tkpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubah-soal-tkpLabel">Ubah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('ubahSoal.TKP')}}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <div class="modal-body" style="overflow-y: scroll">
                <input type="hidden" name="id_paket" id="id_paket">
                <input type="hidden" name="id_soal" id="id_soal">
                <input type="hidden" name="jenis_soal" value="{{ Request::segment(4)}}">
                <div style="
                    font-size: 14px;
                    line-height: 23px;
                    margin-bottom: 0px;
                    padding: 0px 15px 0px;
                    height: 50em;
                    overflow-y: scroll;
                    text-align: justify;">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea id="summernote_soaltkpedit" name="soal_tkpedit" cols="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan A</label>
                                <textarea id="summernote_pilihan_a_tkpedit" name="pilihan_a_tkpedit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_1">Nilai Pilihan A</label>
                                <select class="form-control score-select" id="skor_a_tkpedit" name="skor_a_tkpedit" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan B</label>
                                <textarea id="summernote_pilihan_b_tkpedit" name="pilihan_b_tkpedit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_2">Nilai Pilihan B</label>
                                <select class="form-control score-select" id="skor_b_tkpedit" name="skor_b_tkpedit" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan C</label>
                                <textarea id="summernote_pilihan_c_tkpedit" name="pilihan_c_tkpedit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_3">Nilai Pilihan C</label>
                                <select class="form-control score-select" id="skor_c_tkpedit" name="skor_c_tkpedit" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan D</label>
                                <textarea id="summernote_pilihan_d_tkpedit" name="pilihan_d_tkpedit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_4">Nilai Pilihan D</label>
                                <select class="form-control score-select" id="skor_d_tkpedit" name="skor_d_tkpedit" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <div class="form-group">
                                <label for="soal">Pilihan E</label>
                                <textarea id="summernote_pilihan_e_tkpedit" name="pilihan_e_tkpedit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="select_5">Nilai Pilihan E</label>
                                <select class="form-control score-select" id="skor_e_tkpedit" name="skor_e_tkpedit" required>
                                    <option selected value="">Pilih Skor / Nilai</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kunci">Kunci Jawaban</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_tkpedit" id="inlineRadio1_tkpedit" value="A">
                            <label class="form-check-label" for="inlineRadio1">Jawaban A</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_tkpedit" id="inlineRadio2_tkpedit" value="B">
                            <label class="form-check-label" for="inlineRadio2">Jawaban B</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_tkpedit" id="inlineRadio3_tkpedit" value="C">
                            <label class="form-check-label" for="inlineRadio3">Jawaban C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_tkpedit" id="inlineRadio4_tkpedit" value="D">
                            <label class="form-check-label" for="inlineRadio3">Jawaban D</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions_tkpedit" id="inlineRadio5_tkpedit" value="E">
                            <label class="form-check-label" for="inlineRadio3">Jawaban E</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Modal pembahasan soal --}}
<div class="modal fade" id="pembahasan-soal" data-backdrop="static" tabindex="-1" aria-labelledby="pembahasan-soalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pembahasan-soalLabel">Pembahasan Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('tambahPembahasan')}}" method="POST">
            @csrf
            <div class="modal-body" style="overflow-y: scroll">
                <input type="hidden" name="soal_id" id="soal_id">
                <input type="hidden" name="paket_id" id="paket_id">
                <input type="hidden" name="jenis_soal" value="{{ Request::segment(4)}}">
                <div class="form-group">
                    <label for="soal">Soal</label>
                    <small id="deskripsiSoal" class="form-text mt-0 font-normal"></small>
                </div>
                <div class="form-group">
                    <label for="kunci_jawaban">Kunci Jawaban</label>
                    <div class="row">
                        <div class="col-lg-1 col-12 pr-0">
                            <input type="text" class="form-control rounded-0" id="kunci_jawaban_pembahasan" name="kunci_jawaban_pembahasan" aria-describedby="kunci_jawaban" disabled>
                        </div>
                        <div class="col-lg-5 col-12 pl-0">
                            <input type="text" class="form-control rounded-0" id="deskripsi_jawaban" name="deskripsi_jawaban" aria-describedby="deskripsi_jawaban" disabled>
                        </div>
                    </div>
                  </div>
                <div class="form-group">
                    <label for="soal">Pembahasan Soal</label>
                    <textarea id="summernote_pembahasan_soal" name="pembahasan_soal"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary"> Tambah Pembahasan</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Modal Detail --}}
<div class="modal fade" id="detailPilihanGanda" tabindex="-1" aria-labelledby="detailPilihanGandaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailPilihanGandaLabel">Detail Soal TWK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <div class="modal-body">
            <h6 id="soal-pilihanganda" class="text-bold"></h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item pl-0" style="padding-top: .75rem;" id="pilihan-a"></li>
                <li class="list-group-item pl-0" id="pilihan-b"></li>
                <li class="list-group-item pl-0" id="pilihan-c"></li>
                <li class="list-group-item pl-0" id="pilihan-d"></li>
                <li class="list-group-item pl-0" id="pilihan-e"></li>
            </ul>
       </div>
      </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('.table-detail-twk').DataTable();
        //summernote
        $('#summernote_soal ,#summernote_soal_edit, #summernote_soaltkpedit, #summernote_pembahasan_soal').summernote({
            height: ($(window).height() - 800)
        });
        $('#summernote_pilihan_a, #summernote_pilihan_a_edit, #summernote_pilihan_b, #summernote_pilihan_b_edit, #summernote_pilihan_c, #summernote_pilihan_c_edit, #summernote_pilihan_d, #summernote_pilihan_d_edit, #summernote_pilihan_e, #summernote_pilihan_e_edit').summernote({
            height: ($(window).height() - 900)
        });
        $('#summernote_pilihan_a_tkpedit, #summernote_pilihan_b_tkpedit, #summernote_pilihan_c_tkpedit, #summernote_pilihan_d_tkpedit, #summernote_pilihan_e_tkpedit').summernote({
            height: ($(window).height() - 900)
        });

        $('.modal').css('overflow-y', 'auto')
        //detail
        $('.table-detail-twk').on("click", '.ubah-soal', function(){
            var idVal = $(this).data('id');
            $.get("/administrator/soal/twk/ambil-data/edit/"+idVal, (data) => {
                $("#edit_id").val(idVal);
                $("#summernote_soal_edit").summernote('code', data[0].soal)
                $("#summernote_pilihan_a_edit").summernote('code', data[0].pilihan_a);
                $("#summernote_pilihan_b_edit").summernote('code', data[0].pilihan_b);
                $("#summernote_pilihan_c_edit").summernote('code', data[0].pilihan_c);
                $("#summernote_pilihan_d_edit").summernote('code', data[0].pilihan_d);
                $("#summernote_pilihan_e_edit").summernote('code', data[0].pilihan_e);
                if(data[0].kunci_jawaban == 'A'){
                    $('#inlineRadio_edit1').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'B'){
                    $('#inlineRadio_edit2').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'C'){
                    $('#inlineRadio_edit3').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'D'){
                    $('#inlineRadio_edit4').prop('checked', true);
                } else {
                    $('#inlineRadio_edit5').prop('checked', true);
                }
                // $("#inlineRadio_edit").val(data[0].kunci_jawaban);
                $("#skor_edit").val(data[0].score_soal);
            })
        });
        //pembahasan
        $(".pembahasan-soal").on('click', function(){
            var idVal = $(this).data('id');
            $.get('/administrator/soal/get/pembahasan/'+idVal, (data) => {
                $("#soal_id").val(idVal);
                $('#paket_id').val(data.id_paket)
                $("#deskripsiSoal").html(data.soal)
                $("#kunci_jawaban_pembahasan").val(data.kunci_jawaban)
                if(data.kunci_jawaban == "A"){
                    let jawaban_a = data.pilihan_a;
                    $("#deskripsi_jawaban").val(jawaban_a.replace(/<[^>]+>/g, ''))
                } else if(data.kunci_jawaban == "B"){
                    let jawaban_b = data.pilihan_b;
                    $("#deskripsi_jawaban").val(jawaban_b.replace(/<[^>]+>/g, ''))
                } else if(data.kunci_jawaban == "C"){
                    let jawaban_c = data.pilihan_c;
                    $("#deskripsi_jawaban").val(jawaban_c.replace(/<[^>]+>/g, ''))
                } else if(data.kunci_jawaban == "D"){
                    let jawaban_d = data.pilihan_d;
                    $("#deskripsi_jawaban").val(jawaban_d.replace(/<[^>]+>/g, ''))
                } else {
                    let jawaban_e = data.pilihan_e;
                    $("#deskripsi_jawaban").val(jawaban_e.replace(/<[^>]+>/g, ''))
                }
            })
        })
        //hapus
        $('.show_confirm').click(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak bisa mengembalikan data yang sudah terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus saja!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete_form").submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
        //detail pilihan ganda
        $("body").on('click', ".detail-soal", function() {
            var idVal = $(this).data('id');
            $.get("/administrator/soal/twk/detail/pilihan-ganda/"+idVal, (data) => {
                console.log('pilihan ganda', data);
                $("#soal-pilihanganda").html(data[0].soal);
                $("#pilihan-a").append(`
                    <div class="col-12">
                        <div class="row">
                            A.&nbsp;`+data[0].pilihan_a+`
                        </div>
                    </div>
                `);
                $("#pilihan-b").append(`
                    <div class="col-12">
                        <div class="row">
                            B.&nbsp;`+data[0].pilihan_b+`
                        </div>
                    </div>
                `);
                $("#pilihan-c").append(`
                    <div class="col-12">
                        <div class="row">
                            C.&nbsp;`+data[0].pilihan_c+`
                        </div>
                    </div>
                `);
                $("#pilihan-d").append(`
                    <div class="col-12">
                        <div class="row">
                            D.&nbsp;`+data[0].pilihan_d+`
                        </div>
                    </div>
                `);
                $("#pilihan-e").append(`
                    <div class="col-12">
                        <div class="row">
                            E.&nbsp;`+data[0].pilihan_e+`
                        </div>
                    </div>
                `);
                // $("#pilihan-a").append('A. '+data[0].pilihan_a);
                // $("#pilihan-b").append('B. '+data[0].pilihan_b);
                // $("#pilihan-c").append('C. '+data[0].pilihan_c);
                // $("#pilihan-d").append('D. '+data[0].pilihan_d);
                // $("#pilihan-e").append('E. '+data[0].pilihan_e);
            })
        })
        //tkp
        $(".ubah-soal-tkp").on('click', function(){
            var id = $(this).data('id');
            var id_paket = $(this).data('idpaket');
            $("#id_paket").val(id_paket);
            $('#id_soal').val(id);
            $.get('/administrator/soal/get-data/tkp/'+id_paket, (data) => {
                console.log('data', data);
                $("#summernote_soaltkpedit").summernote('code', data[0].soal);
                $("#summernote_pilihan_a_tkpedit").summernote('code', data[0].pilihan_a);
                $("#summernote_pilihan_b_tkpedit").summernote('code', data[0].pilihan_b);
                $("#summernote_pilihan_c_tkpedit").summernote('code', data[0].pilihan_c);
                $("#summernote_pilihan_d_tkpedit").summernote('code', data[0].pilihan_d);
                $("#summernote_pilihan_e_tkpedit").summernote('code', data[0].pilihan_e);
                if(data[0].kunci_jawaban == 'A'){
                    $('#inlineRadio1_tkpedit').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'B'){
                    $('#inlineRadio2_tkpedit').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'C'){
                    $('#inlineRadio3_tkpedit').prop('checked', true);
                } else if(data[0].kunci_jawaban == 'D'){
                    $('#inlineRadio4_tkpedit').prop('checked', true);
                } else {
                    $('#inlineRadio5_tkpedit').prop('checked', true);
                }
            });

            $.get('/administrator/soal/get-data/tkp/skor/'+id+'/'+id_paket, (data) => {
                $("#skor_a_tkpedit").val(data[0].skor_pilihan_a);
                $("#skor_b_tkpedit").val(data[0].skor_pilihan_b);
                $("#skor_c_tkpedit").val(data[0].skor_pilihan_c);
                $("#skor_d_tkpedit").val(data[0].skor_pilihan_d);
                $("#skor_e_tkpedit").val(data[0].skor_pilihan_e);
            })
        })
    </script>
@endpush