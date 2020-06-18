//REQUIRE
require('./bootstrap');
window.$ = require('jquery');
// PLACES ALGOLIA
var placesAutocomplete = places({
   appId: 'plBZBOWH3DEC',
   apiKey: '593f74e1b84067335abcb422c5d9d7bd',
   container: document.querySelector('#address-input')
});
// var coordinates = placesAutocomplete.on('change', e => console.log([e.suggestion['latlng'].lat,e.suggestion['latlng'].lng]));
// placesAutocomplete.on('change', e => $('#latitude').val(e.suggestion['latlng'].lat));
// placesAutocomplete.on('change', e => $('#longitude').val(e.suggestion['latlng'].lng));

placesAutocomplete.on('change', function(e) {
    $('.apartment-card').removeClass('invisible');

    $('#longitude').val(e.suggestion['latlng'].lng);
    $('#latitude').val(e.suggestion['latlng'].lat);

    var tempLong = e.suggestion['latlng'].lng;
    var tempLat = e.suggestion['latlng'].lat;


    $('.apartment-card').each(function() {
        var lat = $(this).find('.latitude').text();
        var long = $(this).find('.longitude').text();
        // console.log(lat);
        var dist = distance(tempLat, tempLong, lat, long,'K');
        var radius = 40;
        if (dist > radius) {
            $(this).addClass('invisible');
        }
    });

});

$('.form-check-input').click(function() {
    // var selectedService = $(this).val();
    $.ajax({
        'url': '/api/apartments',
        'method': 'GET',
        'success': function(data) {
            // console.log(data);

            $('.apartment-card').each(function() {
                var aptCard = $(this);
                var idApt = $(this).find('.id').text();

                $('.form-check-input').each(function() {
                    var serviceId = $(this).val();

                    if (!aptCard.hasClass('invisible')) {
                        if ($(this).is(':checked')) {
                            // console.log(prova + ' si');
                            var serviceCheck = false;
                            for (var key in data) {
                                if (data[key].apartment_id == idApt && data[key].service_id == serviceId) {
                                    serviceCheck = true;
                                }
                            }
                            if (!serviceCheck) {
                                console.log('hide');
                                aptCard.hide();
                            }
                        } else {
                            console.log('show');
                            aptCard.show();
                        }
                    }
                });

            });

        }
    });
});

function distance(lat1, lon1, lat2, lon2, unit) {
	if ((lat1 == lat2) && (lon1 == lon2)) {
		return 0;
	}
	else {
		var radlat1 = Math.PI * lat1/180;
		var radlat2 = Math.PI * lat2/180;
		var theta = lon1-lon2;
		var radtheta = Math.PI * theta/180;
		var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
		if (dist > 1) {
			dist = 1;
		}
		dist = Math.acos(dist);
		dist = dist * 180/Math.PI;
		dist = dist * 60 * 1.1515;
		if (unit=="K") { dist = dist * 1.609344 }
		if (unit=="N") { dist = dist * 0.8684 }
		return dist;
	}
};





//DATEPICKER
const datepicker = require('js-datepicker');
const picker = datepicker('.datepicker', {
  overlayPlaceholder: 'Inserisci anno di nascita'
})
//MENU SCROLLABILE
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
