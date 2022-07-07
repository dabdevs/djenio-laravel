function getCities(countryId) {
    $.ajax({
        type: "GET",
        url: '/cities/'+countryId,
        success: function(data)
        {
            const cities = data[0].cities 
            
            html = ''
            if(cities.length > 0) {
                cities.forEach(city => {
                    html += '<option value="'+city.id+'" >'+city.name+'</option>'
                }) 
            }
            
            $('#city').html(html)
        }
    });
    
}

function ActivateMessageModal(message) {
    $modal = $('#messageModal')
    $msg = $('#messageText')

    $msg.text(message)

    $modal.modal('show')
}

function DeactivateMessageModal(message) {
    $modal = $('#messageModal')
    $msg = $('#messageText')
    $msg.text("")

    $modal.modal('hide')
}


$(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        maxDate: '-18Y'
    });
})




