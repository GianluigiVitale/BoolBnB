
$('.form-check-input').click(function() {
    $.ajax({
        'url': '/api/apartments',
        'method': 'GET',
        'success': function(data) {
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
                            if (serviceCheck == false) {
                                console.log('hide');
                                aptCard.hide();
                            }
                        } else {
                            console.log('show');
                            // aptCard.show();
                        }
                    }
                });

            });

        }
    });
});
