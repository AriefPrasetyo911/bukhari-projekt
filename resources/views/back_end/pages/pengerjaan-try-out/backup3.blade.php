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
                        <li class="nav-item">
                            <div class="nav-link">
                                <div class="d-flex justify-content-center">
                                    <div class="countdown">
                                        <div class="bloc-time hours" data-init-value="{{$jam}}">
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
                        </li>
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link" href="{{ url()->previous() }}" aria-expanded="false" title="Kembali">
                                <i class="fas fa-arrow-left fa-2x"></i>
                            </a>
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
               aa
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
    
</script>
</html>