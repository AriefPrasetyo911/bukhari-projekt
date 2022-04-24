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
    
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="mm-survey">
          <button class="btn btn-soal mb-4">Soal Ke-1 dari 50</button>
          <div class="mm-survey-progress">
            <div class="mm-survey-progress-bar mm-progress"></div>
          </div>
  
          <div class="mm-survey-results">
            <div class="mm-survey-results-container">
              <h3 class="mm-survey-results-score"></h3>
              <ul class="mm-survey-results-list"></ul>
            </div>
            <div class="mm-survey-results-controller">
              <div class="mm-back-btn">
                <button>Back</button>
              </div>
            </div>
          </div>
          
          <div class="mm-survey-bottom">
            <div class="mm-survey-container">
              <div class="mm-survey-page active" data-page="1">
                <div class="mm-survery-content">
                  <div class="mm-survey-question">
                    <p>Based on history... What is the ideal color for a Ferrari?</p>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio01" data-item="1" name="radio1" value="red" />
                    <label for="radio01"><span></span><p>Red</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio02" data-item="1" name="radio1" value="blue" />
                    <label for="radio02"><span></span><p>Blue</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio03" data-item="1" name="radio1" value="green" />
                    <label for="radio03"><span></span><p>Green</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio04" data-item="1" name="radio1" value="purple" />
                    <label for="radio04"><span></span><p>Purple</p></label>
                  </div>
                </div>
              </div>
              <div class="mm-survey-page" data-page="2">
                <div class="mm-survery-content">
                  <div class="mm-survey-question">
                    <p>Which one of these car brands is made in Germany?</p>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio05" data-item="2" name="radio2" value="honda" />
                    <label for="radio05"><span></span><p>Honda</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio06" data-item="2" name="radio2" value="ford" />
                    <label for="radio06"><span></span><p>Ford</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio07" data-item="2" name="radio2" value="mercedes" />
                    <label for="radio07"><span></span><p>Mercedes</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio08" data-item="2" name="radio2" value="ferrari" />
                    <label for="radio08"><span></span><p>Ferrari</p></label>
                  </div>
                </div>
              </div>
              <div class="mm-survey-page" data-page="3">
                <div class="mm-survery-content">
                  <div class="mm-survey-question">
                    <p>Which is the correct integer for Pi?</p>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio09" data-item="3" name="radio3" value="3" />
                    <label for="radio09"><span></span><p>3</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio10" data-item="3" name="radio3" value="4" />
                    <label for="radio10"><span></span><p>4</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio11" data-item="3" name="radio3" value="3.41" />
                    <label for="radio11"><span></span><p>3.41</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio12" data-item="3" name="radio3" value="3.14" />
                    <label for="radio12"><span></span><p>3.14</p></label>
                  </div>
                </div>
              </div>
              <div class="mm-survey-page" data-page="4">
                <div class="mm-survery-content">
                  <div class="mm-survey-question">
                    <p>The letter 'C' is the nth number in the alphabet, choose the correct number.</p>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio13" data-item="4" name="radio4" value="1" />
                    <label for="radio13"><span></span><p>1</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio14" data-item="4" name="radio4" value="2" />
                    <label for="radio14"><span></span><p>2</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio15" data-item="4" name="radio4" value="3" />
                    <label for="radio15"><span></span><p>3</p></label>
                  </div>
                  <div class="mm-survey-item">
                    <input type="radio" id="radio16" data-item="4" name="radio4" value="4" />
                    <label for="radio16"><span></span><p>4</p></label>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="mm-survey-controller">
              <div class="col-lg-12">
                <div class="mm-prev-btn">
                  <button>Prev</button>
                </div>
                <div class="mm-next-btn">
                  <button disabled="true">Next</button>
                </div>
                <div class="mm-finish-btn">
                  <button>Submit</button>
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
{{-- <script src="{{asset('exam-wizard/js/examwizard.min.js')}}"></script> --}}
<script type="text/javascript">
    
</script>
</html>