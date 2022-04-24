<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mengerjakan Try Out</title>
    <link rel="stylesheet" href="{{asset('css/adminltestyles.css')}}">
    <link rel="stylesheet" href="{{asset('exam-wizard/css/style.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/pengerjaan-soal.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow mb-5 bg-light rounded p-0">
        <div class="container-fluid pl-0 pr-0">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="row">
                <div class="col-lg-11 col-md-10 col-12">
                  <div class="d-flex justify-content-center mt-2 top-title">
                    <h4 class="mr-2"><span class="badge badge-primary">{{$soals->nama_paket}}</span></h4>
                    <h4 class="mr-2"><span class="badge badge-secondary">{{strtoupper($soals->jenis)}}</span></h4>
                    <h4 class="mr-2"><span class="badge badge-danger">{{$today}}</span></h4>
                  </div>
                </div>
                <div class="col-lg-1 col-md-2 col-12 timer text-center">
                  <div id="timer" data-hours="{{$jam}}" data-minutes="{{$menit}}" data-seconds="0"></div>
                </div>
              </div>
            </div>
        </div>
    </nav>
    {{-- content --}}
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-9 col-md-9 questions">
                <form id="examwizard-question" action="{{route('kirimHasilUjian', [$jenis, $id_paket])}}" method="POST">
                    @csrf
                    <input type="hidden" name="jenis" id="jenis" value="{{Request::segment(5)}}">
                    <input type="hidden" name="idPaket" id="idPaket" value="{{Request::segment(6)}}">
                    <?php $no=1?>
                    <?php $num=1?>
                    @foreach ($detailSoal1 as $data)
                        @if ($loop->first)
                            <div class="question" data-question="{{$no++}}">
                                {{-- input hidden --}}
                                <input type="hidden" name="id_soal[]" class="id_soal" value="{{$data->id}}">
                                <input type="hidden" name="soal_no[]" id="soal_no" value="{{$num}}">
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <button class="btn btn-soal mb-4">Soal Ke- {{$num++}} dari {{$jumlahSoal}}</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 pertanyaan">
                                        <h5 class="question-title mb-0">{{strip_tags($data->soal)}}</h5>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xs-12">
                                        <div class="alert alert-danger hidden"></div>
                                        <div class="green-radio color-green">
                                            <ol type="A">
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[0]" data-alternateName="answer[1]" data-alternateValue="A" value="A" id="answer-{{$num++-1}}-1"/><label for="answer-{{$num++-1}}-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[0]" data-alternateName="answer[1]" data-alternateValue="B" value="B" id="answer-{{$num++-1}}-2"/><label for="answer-{{$num++-1}}-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[0]" data-alternateName="answer[1]" data-alternateValue="C" value="C" id="answer-{{$num++-1}}-3"/><label for="answer-{{$num++-1}}-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[0]" data-alternateName="answer[1]" data-alternateValue="D" value="D" id="answer-{{$num++-1}}-4"/><label for="answer-{{$num++-1}}-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[0]" data-alternateName="answer[1]" data-alternateValue="E" value="E" id="answer-{{$num++-1}}-5"/><label for="answer-{{$num++-1}}-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($loop->last)
                            <div class="question hidden" data-question="{{$no++}}">
                                {{-- input hidden --}}
                                <input type="hidden" name="id_soal[]" class="id_soal" value="{{$data->id}}">
                                <input type="hidden" name="soal_no[]" id="soal_no" value="{{$no-1}}">
                                {{-- ==== --}}
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <button class="btn btn-soal mb-4" disabled>Soal Ke- {{$no-1}} dari {{$jumlahSoal}}</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 pertanyaan">
                                        <h5 class="question-title mb-0">{{strip_tags($data->soal)}}</h5>
                                    </div>
                                </div>
                                <div class="row mt-50">
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger hidden"></div>
                                        <div class="green-radio color-green">
                                            <ol type="A">
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="A" value="A" id="answer-0-1"/><label for="answer-0-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="B" value="B" id="answer-0-2"/><label for="answer-0-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="C" value="C" id="answer-0-3"/><label for="answer-0-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="D" value="D" id="answer-0-4"/><label for="answer-0-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="E" value="E" id="answer-0-5"/><label for="answer-0-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="question hidden" data-question="{{$no++}}">
                                {{-- input hidden --}}
                                <input type="hidden" name="id_soal[]" class="id_soal" value="{{$data->id}}">
                                <input type="hidden" name="soal_no[]" id="soal_no" value="{{$no-1}}">
                                {{-- <input type="hidden" name="pilihan_a" id="pilihan_a" value="{{strip_tags($data->pilihan_a)}}">
                                <input type="hidden" name="pilihan_b" id="pilihan_b" value="{{strip_tags($data->pilihan_b)}}">
                                <input type="hidden" name="pilihan_c" id="pilihan_c" value="{{strip_tags($data->pilihan_c)}}">
                                <input type="hidden" name="pilihan_d" id="pilihan_d" value="{{strip_tags($data->pilihan_d)}}">
                                <input type="hidden" name="pilihan_e" id="pilihan_e" value="{{strip_tags($data->pilihan_e)}}"> --}}
                                {{-- ==== --}}
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <button class="btn btn-soal mb-4">Soal Ke- {{$no-1}} dari {{$jumlahSoal}}</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 pertanyaan">
                                        <h5 class="question-title mb-0">{{strip_tags($data->soal)}}</h5>
                                    </div>
                                </div>
                                <div class="row mt-50">
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger hidden"></div>
                                        <div class="green-radio color-green">
                                            <ol type="A">
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="A" value="A" id="answer-{{$no-1}}-1"/><label for="answer-{{$no-1}}-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="B" value="B" id="answer-{{$no-1}}-2"/><label for="answer-{{$no-1}}-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="C" value="C" id="answer-{{$no-1}}-3"/><label for="answer-{{$no-1}}-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="D" value="D" id="answer-{{$no-1}}-4"/><label for="answer-{{$no-1}}-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                </li>
                                                <li class="font-size-30 answer-number">
                                                    <input type="radio" data-alternatetype="radio" name="pilihanUser[]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="E" value="E" id="answer-{{$no-1}}-5"/><label for="answer-{{$no-1}}-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                    <input type="hidden" value="{{$jumlahSoal}}" id="totalOfQuestion" name="totalOfQuestion" />
                    <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />

                    <!-- Exmas Footer - Multi Step Pages Footer -->
                    <div class="col-lg-12 col-12 exams-footer">
                        <div class="row">
                            <div class="col-lg-2  back-to-prev-question-wrapper text-center">
                                <div class="d-flex justify-content-start">
                                    <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-success disabled">
                                        Back
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 footer-question-number-wrapper text-center">
                                <div class="d-flex justify-content-center">
                                    <div class="mt-4">
                                        <span id="current-question-number-label">1</span>
                                        <span>dari <b>{{$jumlahSoal}}</b> </span>
                                    </div>
                                    <div class="mt-4">
                                        &nbsp;Pertanyaan
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 go-to-next-question-wrapper text-center">
                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-success ">
                                        Next
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-2 footer-finish-question-wrapper text-center">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="finishExams"  class="btn btn-success disabled"><b>Selesai</b></button>
                                    {{-- <a href="javascript:void(0);" id="finishExams" class="btn btn-success disabled">
                                        <b>Selesai</b>
                                    </a> --}}
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-3" id="quick-access-section">
                <table class="table table-responsive table-borderd table-hover table-striped text-center w-100">
                    <thead class="question-response-header">
                        <tr><th class="text-center">Question</th>
                            <th class="text-center">Response</th></tr>
                    </thead>
                    <tbody>
                        @for($j = 1; $j < $jumlahSoal+1; $j++)
                            <tr class="question-response-rows" data-question="{{$j}}">
                                <td>{{$j}}</td>
                                <td class="question-response-rows-value">-</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                <div class="col-xs-12">
                    <a href="javascript:void(0)" class="btn btn-success" id="quick-access-prev">< Back</a>
                    <span class="alert alert-info" id="quick-access-info"></span>
                    <a href="javascript:void(0)" class="btn btn-success" id="quick-access-next">Next ></a>
                </div>
            </div>
        </div>
    </div>    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script> --}}
<script src="{{asset('js/pengerjaan-soal.js')}}"></script>
<script src="{{asset('exam-wizard/js/examwizard.js')}}"></script>
<script type="text/javascript">
    var examWizard = $.fn.examWizard({
        finishOption: {
            enableModal: true,
        },
        quickAccessOption: {
            quickAccessPagerItem: 9,
        },
    });
</script>
</html>