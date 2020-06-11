window.$ = require('jquery');
const datepicker = require('js-datepicker');
const picker = datepicker('.datepicker', {
  overlayPlaceholder: 'Inserisci anno di nascita'
})
$(window).scroll(function(){
    if ($(window).scrollTop() >= 57) {
        $('#myHeader').addClass('fixed-');
}if($(window).scrollTop() >= 114){
        $('#myHeader').removeClass('fixed-');
        $('#myHeader').addClass('fixed');

    }
    else {
       $('#myHeader').removeClass('fixed-');
       $('#myHeader').removeClass('fixed');
    }
});
