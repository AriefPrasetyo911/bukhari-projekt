// jQuery('.mm-prev-btn').hide();

// var x;
// var count;
// var current;
// var percent;
// var z = [];

// init();
// getCurrentSlide();
// goToNext();
// goToPrev();
// getCount();
// // checkStatus();
// // buttonConfig();
// buildStatus();
// deliverStatus();
// submitData();
// goBack();

// function init() {
  
//   jQuery('.mm-survey-container .mm-survey-page').each(function() {

//     var item;
//     var page;

//     item = jQuery(this);
//     page = item.data('page');

//     item.addClass('mm-page-'+page);
//     //item.html(page);

//   });

// }

// function getCount() {

//   count = jQuery('.mm-survey-page').length;
//   return count;

// }

// function goToNext() {

//   jQuery('.mm-next-btn').on('click', function() {
//     goToSlide(x);
//     getCount();
//     current = x + 1;
//     var g = current/count;
//     buildProgress(g);
//     var y = (count + 1);
//     getButtons();
//     jQuery('.mm-survey-page').removeClass('active');
//     jQuery('.mm-page-'+current).addClass('active');
//     getCurrentSlide();
//     checkStatus();
//     if( jQuery('.mm-page-'+count).hasClass('active') ){
//       if( jQuery('.mm-page-'+count).hasClass('pass') ) {
//         jQuery('.mm-finish-btn').addClass('active');
//       }
//       else {
//         jQuery('.mm-page-'+count+' .mm-survery-content .mm-survey-item').on('click', function() {
//           jQuery('.mm-finish-btn').addClass('active');
//         });
//       }
//     }
//     else {
//       jQuery('.mm-finish-btn').removeClass('active');
//       if( jQuery('.mm-page-'+current).hasClass('pass') ) {
//         jQuery('.mm-survey-container').addClass('good');
//         jQuery('.mm-survey').addClass('okay');
//       }
//       else {
//         jQuery('.mm-survey-container').removeClass('good');
//         jQuery('.mm-survey').removeClass('okay');
//       }
//     }
//     buttonConfig();
//   });

// }

// function goToPrev() {

//   jQuery('.mm-prev-btn').on('click', function() {
//     goToSlide(x);
//     getCount();			
//     current = (x - 1);
//     var g = current/count;
//     buildProgress(g);
//     var y = count;
//     getButtons();
//     jQuery('.mm-survey-page').removeClass('active');
//     jQuery('.mm-page-'+current).addClass('active');
//     getCurrentSlide();
//     checkStatus();
//     jQuery('.mm-finish-btn').removeClass('active');
//     if( jQuery('.mm-page-'+current).hasClass('pass') ) {
//       jQuery('.mm-survey-container').addClass('good');
//       jQuery('.mm-survey').addClass('okay');
//     }
//     else {
//       jQuery('.mm-survey-container').removeClass('good');
//       jQuery('.mm-survey').removeClass('okay');
//     }
//     buttonConfig();
//   });

// }

// function buildProgress(g) {

//   if(g > 1){
//     g = g - 1;
//   }
//   else if (g === 0) {
//     g = 1;
//   }
//   g = g * 100;
//   jQuery('.mm-survey-progress-bar').css({ 'width' : g+'%' });

// }

// function goToSlide(x) {
//   return x;
// }

// function getCurrentSlide() {
//   jQuery('.mm-survey-page').each(function() {
//     var item;
//     item = jQuery(this);
//     if( jQuery(item).hasClass('active') ) {
//       x = item.data('page');
//     }
//     else {}

//     return x;
//   });
// }

// function getButtons() {
//   if(current === 0) {
//     current = y;
//   }
//   if(current === count) {
//     jQuery('.mm-next-btn').hide();
//   }
//   else if(current === 1) {
//     jQuery('.mm-prev-btn').hide();
//   }
//   else {
//     jQuery('.mm-next-btn').show();
//     jQuery('.mm-prev-btn').show();
//   }
// }

// jQuery('.mm-survey-q li input').each(function() {

//   var item;
//   item = jQuery(this);

//   jQuery(item).on('click', function() {
//     if( jQuery('input:checked').length > 0 ) {
//         // console.log(item.val());
//         jQuery('label').parent().removeClass('active');
//         item.closest( 'li' ).addClass('active');
//     }
//     else {
//       //
//     }
//   });

// });

// percent = (x/count) * 100;
// jQuery('.mm-survey-progress-bar').css({ 'width' : percent+'%' });

// function checkStatus() {
//   jQuery('.mm-survery-content .mm-survey-item').on('click', function() {
//     var item;
//     item = jQuery(this);
//     item.closest('.mm-survey-page').addClass('pass');
//   });
// }

// function buildStatus() {
//   jQuery('.mm-survery-content .mm-survey-item').on('click', function() {
//     var item;
//     item = jQuery(this);
//     item.addClass('bingo');
//     item.closest('.mm-survey-page').addClass('pass');
//     jQuery('.mm-survey-container').addClass('good');
//   });
// }

// function deliverStatus() {
//   jQuery('.mm-survey-item').on('click', function() {
//     if( jQuery('.mm-survey-container').hasClass('good') ){
//       jQuery('.mm-survey').addClass('okay');
//     }
//     else {
//       jQuery('.mm-survey').removeClass('okay');	
//     }
//     buttonConfig();
//   });
// }

// function lastPage() {
//   if( jQuery('.mm-next-btn').hasClass('cool') ) {
//     alert('cool');
//   }
// }

// function buttonConfig() {
//   if( jQuery('.mm-survey').hasClass('okay') ) {
//     jQuery('.mm-next-btn button').prop('disabled', false);
//   }
//   else {
//     jQuery('.mm-next-btn button').prop('disabled', true);
//   }
// }

// function submitData() {
//   jQuery('.mm-finish-btn').on('click', function() {
//     console.log('submit data');
//     collectData();
//     // jQuery('.mm-survey-bottom').slideUp();
//     // jQuery('.mm-survey-results').slideDown();
//   });
// }

// function collectData() {
  
//   var map = {};
//   var ax = ['0','red','mercedes','3.14','3'];
//   var answer = '';
//   var total = 0;
//   var ttl = 0;
//   var g;
//   var c = 0;

//   jQuery('.mm-survey-item input:checked').each(function(index, val) {
//     var item;
//     var data;
//     var name;
//     var n;

//     item = jQuery(this);
//     data = item.val();
//     name = item.data('item');
//     n = parseInt(data);
//     total += n;

//     map[name] = data;

//   });

//   jQuery('.mm-survey-results-container .mm-survey-results-list').html('');

//   for (i = 1; i <= count; i++) {

//     var t = {};
//     var m = {};
//     answer += map[i] + '<br>';
    
//     if( map[i] === ax[i]) {
//       g = map[i];
//       p = 'correct';
//       c = 1;
//     }
//     else {
//       g = map[i];
//       p = 'incorrect';
//       c = 0;
//     }

//     jQuery('.mm-survey-results-list').append('<li class="mm-survey-results-item '+p+'"><span class="mm-item-number">'+i+'</span><span class="mm-item-info">'+g+' - '+p+'</span></li>');

//     m[i] = c;
//     ttl += m[i];

//   }

//   var results;
//   results = ( ( ttl / count ) * 100 ).toFixed(0);

//   jQuery('.mm-survey-results-score').html( results + '%' );

// }

// function goBack() {
//   jQuery('.mm-back-btn').on('click', function() {
//     jQuery('.mm-survey-bottom').slideDown();
//     jQuery('.mm-survey-results').slideUp();
//   });
// }

// timer 
/*
** How to use:
*** Create a parent element
*** set id="timer"
*** set data-hours for the hours counter
*** set data-minutes for the hours counter
*** set data-seconds for the hours counter
**** note
** if you dont set data-hours, data-minutes, data-seconds by default these set value 0
** if you dont set data-timer-end by default it's set timer-end
*/

const oneSec = 1000,
      container = document.getElementById('timer');

let dataHours 	= container.getAttribute('data-hours'),
    dataMinutes = container.getAttribute('data-minutes'),
    dataSeconds = container.getAttribute('data-seconds'),
		timerEnd 		= container.getAttribute('data-timer-end'),
		timerOnEndMsg = "data-timer-end";

if (dataHours == '' || dataHours == null || dataHours == NaN) {
  dataHours = "0";
}
if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
  dataMinutes = "0";
}
if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
  dataSeconds = "0";
}

let hoursSpan = document.createElement('span'),
    minutesSpan = document.createElement('span'),
    secondsSpan = document.createElement('span'),
    separator1 = document.createElement('span'),
    separator2 = document.createElement('span'),
    separatorValue = ":",
    max = 59,
    s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
    m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
    h = parseInt(dataHours);

secondsSpan.classList.add('time');
minutesSpan.classList.add('time');
hoursSpan.classList.add('time');
separator1.classList.add('separator');
separator1.textContent = separatorValue;
separator2.classList.add('separator');
separator2.textContent = separatorValue;

checkValue = (value)=>{
  if (value < 10) {
    return "0" + value;
  } else {
    return value;
  }
}

hoursSpan.textContent = checkValue(dataHours);
minutesSpan.textContent = checkValue(dataMinutes);
secondsSpan.textContent = checkValue(dataSeconds);

timer = (sv,mv,hv)=>{

  s = parseInt(sv);
  m = parseInt(mv);
  h = parseInt(hv);
  
  if (s > 0) {
    return s -= 1;
  } else {
    s = max;
    if (m > 0) {
      return m -= 1;
    } else {
      m = max;
      if (h > 0) {
        return h -= 1;
      }
    }
  }
}

finished = ()=>{
  max = 0;
	let timerEnd = container.getAttribute(timerOnEndMsg);
	container.setAttribute(timerOnEndMsg, 'true');
	if (timerEnd == '' || timerEnd == null) {
		container.textContent = "timer-end";
	} else {
		container.textContent = timerEnd;
	}
}

counter = setInterval(()=>{

  if (h == 0 && m == 0 && s == 0) {
    clearInterval(counter, finished());
  }

  if (s >= 0) {
    timer(s,m,h);
    hoursSpan.textContent   = checkValue(h);
    minutesSpan.textContent = checkValue(m);
    secondsSpan.textContent = checkValue(s);
  }
}, oneSec);

let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];

for (child of children) {
  container.appendChild(child);
}

//kirim hasil quiz
$("#finishExams").on("click", function(e){
  e.preventDefault();
  var jenis = $("#jenis").val();
  var idPaket = $("#idPaket").val();
  var id_soal = $(".id_soal").val();
  var soal_no = $(".soal_no").val();
  Swal.fire({
    title: 'Apakah Anda sudah yakin dan mantap?',
    text: "Anda tidak bisa mengubah data yang sudah dikirimkan",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Saya yakin!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Terkirim!',
        'Data ujian Anda sudah terkirim.',
        'success'
      );

      $("#examwizard-question").submit();
    }
  })
  // console.log('kirim');
  // $('#finishExamsModal').modal('hide')
  // var jenis = $("#jenis").val();
  // var idPaket = $("#idPaket").val();
  // var id_soal = $(".id_soal").val();
  // var soal_no = $(".soal_no").val();

  // $.ajaxSetup({
  //   headers: {
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   }
  // });

  // $.ajax({
  //   url: "/home/try-out/kirim-hasil-ujian/"+jenis+"/"+idPaket,
  //   type: 'POST',
  //   data: {
  //     jenis: jenis,
  //     id_paket: idPaket,
  //     id_soal: id_soal,
  //     soal_no: soal_no
  //   },
  //   success: function(response){
  //     console.log(response);
  //     if (response) {
  //       console.log('sukses');
  //       $("#examwizard-question")[0].reset(); 
  //     }
  //   },
  //   error: function(response){
  //     console.log('gagal');
  //     console.log(response);
  //   }
  // })
})