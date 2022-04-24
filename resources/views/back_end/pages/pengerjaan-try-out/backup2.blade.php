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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{str_replace('-', ' ', config('app.name'))}}</a>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <img class="rounded-circle" src="https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png" data-holder-rendered="true">
                                Halo, {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url()->previous() }}">Kembali</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="height: 25px;"></nav>
    <div class="container-fluid content-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-9">
                        <form id="examwizard-question" action="{{route('kirimHasilUjian', [$jenis, $id_paket])}}" method="POST">
                            @csrf
                            <input type="hidden" name="jenis" id="jenis" value="{{Request::segment(4)}}">
                            <input type="hidden" name="idPaket" id="idPaket" value="{{Request::segment(5)}}">
                            <?php $no=1?>
                            <?php $num=1?>
                            @foreach ($detailSoal1 as $data)
                                @if ($loop->first)
                                    <div class="question" data-question="{{$no++}}">
                                        {{-- input hidden --}}
                                        <input type="hidden" name="id_soal" id="id_soal" value="{{$data->id}}">
                                        <input type="hidden" name="soal_no" id="soal_no" value="{{$num}}">
                                        <input type="hidden" name="pilihan_a" id="pilihan_a" value="{{strip_tags($data->pilihan_a)}}">
                                        <input type="hidden" name="pilihan_b" id="pilihan_b" value="{{strip_tags($data->pilihan_b)}}">
                                        <input type="hidden" name="pilihan_c" id="pilihan_c" value="{{strip_tags($data->pilihan_c)}}">
                                        <input type="hidden" name="pilihan_d" id="pilihan_d" value="{{strip_tags($data->pilihan_d)}}">
                                        <input type="hidden" name="pilihan_e" id="pilihan_e" value="{{strip_tags($data->pilihan_e)}}">
                                        {{-- ==== --}}
                                        <div class="row mb-1">
                                            <div class="col-xs-12">
                                                <h4 class="question-title color-green">Soal Nomor: {{$num++}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h5 class="question-title color-green">{{strip_tags($data->soal)}}</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-50">
                                            <div class="col-xs-12">
                                                <div class="alert alert-danger hidden"></div>
                                                <div class="green-radio color-green">
                                                    <ol type="A">
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[0]" data-alternateName="answer[0]" data-alternateValue="A" value="1" id="answer-{{$num++-1}}-1"/><label for="answer-{{$num++-1}}-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[0]" data-alternateName="answer[0]" data-alternateValue="B" value="2" id="answer-{{$num++-1}}-2"/><label for="answer-{{$num++-1}}-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[0]" data-alternateName="answer[0]" data-alternateValue="C" value="3" id="answer-{{$num++-1}}-3"/><label for="answer-{{$num++-1}}-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[0]" data-alternateName="answer[0]" data-alternateValue="D" value="4" id="answer-{{$num++-1}}-4"/><label for="answer-{{$num++-1}}-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[0]" data-alternateName="answer[0]" data-alternateValue="E" value="5" id="answer-{{$num++-1}}-5"/><label for="answer-{{$num++-1}}-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($loop->last)
                                    <div class="question hidden" data-question="{{$no++}}">
                                        {{-- input hidden --}}
                                        <input type="hidden" name="id_soal" id="id_soal" value="{{$data->id}}">
                                        <input type="hidden" name="soal_no" id="soal_no" value="{{$num}}">
                                        <input type="hidden" name="pilihan_a" id="pilihan_a" value="{{strip_tags($data->pilihan_a)}}">
                                        <input type="hidden" name="pilihan_b" id="pilihan_b" value="{{strip_tags($data->pilihan_b)}}">
                                        <input type="hidden" name="pilihan_c" id="pilihan_c" value="{{strip_tags($data->pilihan_c)}}">
                                        <input type="hidden" name="pilihan_d" id="pilihan_d" value="{{strip_tags($data->pilihan_d)}}">
                                        <input type="hidden" name="pilihan_e" id="pilihan_e" value="{{strip_tags($data->pilihan_e)}}">
                                        {{-- ==== --}}
                                        <div class="row mb-1">
                                            <div class="col-xs-12">
                                                <h4 class="question-title color-green">Soal Nomor: {{$no-1}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h5 class="question-title color-green">{{strip_tags($data->soal)}}</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-50">
                                            <div class="col-xs-12">
                                                <div class="alert alert-danger hidden"></div>
                                                <div class="green-radio color-green">
                                                    <ol type="A">
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="A" value="1" id="answer-0-1"/><label for="answer-0-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="B" value="2" id="answer-0-2"/><label for="answer-0-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="C" value="3" id="answer-0-3"/><label for="answer-0-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="D" value="4" id="answer-0-4"/><label for="answer-0-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="E" value="5" id="answer-0-5"/><label for="answer-0-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="question hidden" data-question="{{$no++}}">
                                        {{-- input hidden --}}
                                        <<input type="hidden" name="id_soal" id="id_soal" value="{{$data->id}}">
                                        <input type="hidden" name="soal_no" id="soal_no" value="{{$num}}">
                                        <input type="hidden" name="pilihan_a" id="pilihan_a" value="{{strip_tags($data->pilihan_a)}}">
                                        <input type="hidden" name="pilihan_b" id="pilihan_b" value="{{strip_tags($data->pilihan_b)}}">
                                        <input type="hidden" name="pilihan_c" id="pilihan_c" value="{{strip_tags($data->pilihan_c)}}">
                                        <input type="hidden" name="pilihan_d" id="pilihan_d" value="{{strip_tags($data->pilihan_d)}}">
                                        <input type="hidden" name="pilihan_e" id="pilihan_e" value="{{strip_tags($data->pilihan_e)}}">
                                        {{-- ==== --}}
                                        <div class="row mb-1">
                                            <div class="col-xs-12">
                                                <h4 class="question-title color-green">Soal Nomor: {{$no-1}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h5 class="question-title color-green">{{strip_tags($data->soal)}}</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-50">
                                            <div class="col-xs-12">
                                                <div class="alert alert-danger hidden"></div>
                                                <div class="green-radio color-green">
                                                    <ol type="A">
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="A" value="1" id="answer-{{$no-1}}-1"/><label for="answer-{{$no-1}}-1" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_a)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="B" value="2" id="answer-{{$no-1}}-2"/><label for="answer-{{$no-1}}-2" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_b)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="C" value="3" id="answer-{{$no-1}}-3"/><label for="answer-{{$no-1}}-3" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_c)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="D" value="4" id="answer-{{$no-1}}-4"/><label for="answer-{{$no-1}}-4" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_d)}} </label>
                                                        </li>
                                                        <li class="font-size-30 answer-number">
                                                            <input type="radio" data-alternatetype="radio" name="fieldName[{{$no-1}}]" data-alternateName="answer[{{$no-1}}]" data-alternateValue="E" value="5" id="answer-{{$no-1}}-5"/><label for="answer-{{$no-1}}-5" class="answer-text"><span></span> &nbsp;{{strip_tags($data->pilihan_e)}} </label>
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
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body d-flex justify-content-center">
                                <div class="countdown">
                                    <div class="bloc-time hours" data-init-value="{{$jam}}">
                                      <span class="count-title">Jam</span>
                                
                                      <div class="figure hours hours-1">
                                        <span class="top">2</span>
                                        <span class="top-back">
                                          <span>2</span>
                                        </span>
                                        <span class="bottom">2</span>
                                        <span class="bottom-back">
                                          <span>2</span>
                                        </span>
                                      </div>
                                
                                      <div class="figure hours hours-2">
                                        <span class="top">4</span>
                                        <span class="top-back">
                                          <span>4</span>
                                        </span>
                                        <span class="bottom">4</span>
                                        <span class="bottom-back">
                                          <span>4</span>
                                        </span>
                                      </div>
                                    </div>
                                
                                    <div class="bloc-time min" data-init-value="{{$menit}}">
                                      <span class="count-title">Menit</span>
                                
                                      <div class="figure min min-1">
                                        <span class="top">0</span>
                                        <span class="top-back">
                                          <span>0</span>
                                        </span>
                                        <span class="bottom">0</span>
                                        <span class="bottom-back">
                                          <span>0</span>
                                        </span>        
                                      </div>
                                
                                      <div class="figure min min-2">
                                       <span class="top">0</span>
                                        <span class="top-back">
                                          <span>0</span>
                                        </span>
                                        <span class="bottom">0</span>
                                        <span class="bottom-back">
                                          <span>0</span>
                                        </span>
                                      </div>
                                    </div>
                                
                                    <div class="bloc-time sec" data-init-value="0">
                                      <span class="count-title">Detik</span>
                                
                                        <div class="figure sec sec-1">
                                        <span class="top">0</span>
                                        <span class="top-back">
                                          <span>0</span>
                                        </span>
                                        <span class="bottom">0</span>
                                        <span class="bottom-back">
                                          <span>0</span>
                                        </span>          
                                      </div>
                                
                                      <div class="figure sec sec-2">
                                        <span class="top">0</span>
                                        <span class="top-back">
                                          <span>0</span>
                                        </span>
                                        <span class="bottom">0</span>
                                        <span class="bottom-back">
                                          <span>0</span>
                                        </span>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card-group answer">
                            @for($j = 1; $j < $jumlahSoal+1; $j++)
                                <div class="card question-response-rows" data-question="{{$j}}">
                                    <div class="card-body text-center">
                                        <span>{{$j}}</span>
                                        <span class="question-response-rows-value">-</span>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
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
                                <a href="javascript:void(0);" id="finishExams" class="btn btn-success disabled">
                                    <b>Selesai</b>
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="{{asset('js/pengerjaan-soal.js')}}"></script>
<script src="{{asset('exam-wizard/js/examwizard.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("body").on("click", "#go-to-next-question",(e) => {
            // e.preventDefault();
            var step = $(this).data('question')
            console.log('step', step);
            // if($(".question").hasClass('hidden')){
            //     console.log('have class');
            // } else {
            //     console.log('dont have');
            //     var id_soal = $("#id_soal").val();
            //     var soal_no = $("#soal_no").val();

            //     var pilihan_a = $("#pilihan_a").val();
            //     var pilihan_b = $("#pilihan_b").val();
            //     var pilihan_c = $("#pilihan_c").val();
            //     var pilihan_d = $("#pilihan_d").val();
            //     var pilihan_e = $("#pilihan_e").val();

            //     console.log('id_Soal', id_soal);
            //     console.log('soal_no', soal_no);
            //     console.log('pilihan_a', pilihan_a);
            //     console.log('pilihan_b', pilihan_b);
            //     console.log('pilihan_c', pilihan_c);
            //     console.log('pilihan_d', pilihan_d);
            //     console.log('pilihan_e', pilihan_e);
            // }
            

            // <input type="hidden" name="id_soal" id="id_soal" value="{{$data->id}}">
            // <input type="hidden" name="soal_no" id="soal_no" value="{{$num}}">
            // <input type="hidden" name="pilihan_a" id="pilihan_a" value="{{strip_tags($data->pilihan_a)}}">
            // <input type="hidden" name="pilihan_b" id="pilihan_b" value="{{strip_tags($data->pilihan_b)}}">
            // <input type="hidden" name="pilihan_c" id="pilihan_c" value="{{strip_tags($data->pilihan_c)}}">
            // <input type="hidden" name="pilihan_d" id="pilihan_d" value="{{strip_tags($data->pilihan_d)}}">
            // <input type="hidden" name="pilihan_e" id="pilihan_e" value="{{strip_tags($data->pilihan_e)}}">
        })
    })
</script>
</html>